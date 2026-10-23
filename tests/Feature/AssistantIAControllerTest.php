<?php

namespace Tests\Feature;

use App\Http\Controllers\AssistantIAController;
use App\Models\AssistantConversation;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\Lecon;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizTentative;
use App\Models\Ressource;
use App\Models\RessourceProgression;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssistantIAControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_le_contexte_ne_contient_que_la_formation_et_les_resultats_de_l_apprenant(): void
    {
        $formateur = Formateur::create([
            'user_id' => User::factory()->create()->id,
            'telephone' => '0102030405',
            'specialite' => 'Pédagogie',
        ]);
        $apprenant = User::factory()->create();
        $autreApprenant = User::factory()->create();

        $formation = Formation::create([
            'formateur_id' => $formateur->id,
            'titre' => 'Laravel avancé',
            'description' => 'Construire une API sécurisée.',
        ]);
        $autreFormation = Formation::create([
            'formateur_id' => $formateur->id,
            'titre' => 'Python secret',
            'description' => 'Contenu qui ne doit pas être transmis.',
        ]);

        Inscription::create([
            'user_id' => $apprenant->id,
            'formation_id' => $formation->id,
            'statut' => 'valide',
            'progression' => 40,
        ]);

        $module = Module::create([
            'formation_id' => $formation->id,
            'titre' => 'Authentification',
            'objectif' => 'Protéger les accès.',
            'ordre' => 1,
        ]);
        $lecon = Lecon::create([
            'module_id' => $module->id,
            'titre' => 'Sanctum',
            'description' => 'Créer des jetons personnels.',
            'ordre' => 1,
        ]);
        $ressource = Ressource::create([
            'lecon_id' => $lecon->id,
            'nom' => 'Guide Sanctum',
            'type' => 'pdf',
            'fichier' => 'sanctum.pdf',
        ]);
        $quiz = Quiz::create([
            'module_id' => $module->id,
            'titre' => 'Quiz Sanctum',
            'note_minimale' => 70,
        ]);

        RessourceProgression::create([
            'user_id' => $apprenant->id,
            'ressource_id' => $ressource->id,
            'terminee' => true,
        ]);
        QuizTentative::create([
            'user_id' => $apprenant->id,
            'quiz_id' => $quiz->id,
            'note' => 85,
            'reussi' => true,
            'date_passage' => now(),
        ]);
        QuizTentative::create([
            'user_id' => $autreApprenant->id,
            'quiz_id' => $quiz->id,
            'note' => 100,
            'reussi' => true,
            'date_passage' => now(),
        ]);

        $moduleExterne = Module::create([
            'formation_id' => $autreFormation->id,
            'titre' => 'Module confidentiel',
            'ordre' => 1,
        ]);
        $quizExterne = Quiz::create([
            'module_id' => $moduleExterne->id,
            'titre' => 'Quiz confidentiel',
            'note_minimale' => 70,
        ]);
        QuizTentative::create([
            'user_id' => $apprenant->id,
            'quiz_id' => $quizExterne->id,
            'note' => 99,
            'reussi' => true,
            'date_passage' => now(),
        ]);

        $controller = new class extends AssistantIAController {
            public function buildContext(User $user): string
            {
                return $this->contexteApprenant($user);
            }
        };

        $contexte = $controller->buildContext($apprenant);

        $this->assertStringContainsString('Formation : Laravel avancé', $contexte);
        $this->assertStringContainsString('Leçon : Sanctum', $contexte);
        $this->assertStringContainsString('Ressource : Guide Sanctum (type : pdf)', $contexte);
        $this->assertStringContainsString('Progression enregistrée : 40 %', $contexte);
        $this->assertStringContainsString('Quiz Sanctum', $contexte);
        $this->assertStringContainsString('note : 85 %', $contexte);
        $this->assertStringNotContainsString('Python secret', $contexte);
        $this->assertStringNotContainsString('Module confidentiel', $contexte);
        $this->assertStringNotContainsString('Quiz confidentiel', $contexte);
        $this->assertStringNotContainsString('note : 99 %', $contexte);
        $this->assertStringNotContainsString('note : 100 %', $contexte);
    }

    public function test_l_historique_est_charge_uniquement_pour_l_apprenant_connecte(): void
    {
        $apprenant = User::factory()->create();
        $autreApprenant = User::factory()->create();

        AssistantConversation::create(['user_id' => $apprenant->id])
            ->messages()
            ->createMany([
                ['role' => 'user', 'content' => 'Ma première question'],
                ['role' => 'assistant', 'content' => 'Ma première réponse'],
            ]);
        AssistantConversation::create(['user_id' => $autreApprenant->id])
            ->messages()
            ->create([
                'role' => 'user',
                'content' => 'Message privé de l’autre apprenant',
            ]);

        $response = $this->actingAs($apprenant)
            ->getJson(route('assistant_messages'));

        $response->assertOk()
            ->assertJsonCount(2, 'messages')
            ->assertJsonPath('messages.0.content', 'Ma première question')
            ->assertJsonPath('messages.1.content', 'Ma première réponse')
            ->assertJsonMissing(['content' => 'Message privé de l’autre apprenant']);
    }

    public function test_une_question_et_sa_reponse_sont_sauvegardees_dans_la_conversation_existante(): void
    {
        $apprenant = User::factory()->create();
        $conversation = AssistantConversation::create(['user_id' => $apprenant->id]);

        $controller = new class extends AssistantIAController {
            protected function reponseGroq(array $messages, bool $avecImage = false): string
            {
                return 'Réponse de test de l’assistant.';
            }
        };
        $this->app->instance(AssistantIAController::class, $controller);

        $response = $this->actingAs($apprenant)
            ->postJson(route('assistant_message'), [
                'message' => 'Pouvez-vous m’aider ?',
                'mode' => 'motivation',
                'language' => 'fr',
            ]);

        $response->assertOk()
            ->assertJsonPath('reponse', 'Réponse de test de l’assistant.');

        $this->assertDatabaseCount('assistant_conversations', 1);
        $this->assertDatabaseHas('assistant_messages', [
            'assistant_conversation_id' => $conversation->id,
            'role' => 'user',
            'content' => 'Pouvez-vous m’aider ?',
            'mode' => 'motivation',
            'language' => 'fr',
        ]);
        $this->assertDatabaseHas('assistant_messages', [
            'assistant_conversation_id' => $conversation->id,
            'role' => 'assistant',
            'content' => 'Réponse de test de l’assistant.',
        ]);
    }

    public function test_un_apprenant_peut_modifier_une_question_et_regenerer_la_reponse(): void
    {
        $apprenant = User::factory()->create();
        $conversation = AssistantConversation::create(['user_id' => $apprenant->id]);
        $question = $conversation->messages()->create([
            'role' => 'user',
            'content' => 'Ancienne question',
        ]);
        $conversation->messages()->create([
            'role' => 'assistant',
            'content' => 'Ancienne réponse',
        ]);
        $conversation->messages()->create([
            'role' => 'user',
            'content' => 'Question qui dépend de la précédente',
        ]);

        $controller = new class extends AssistantIAController {
            protected function reponseGroq(array $messages, bool $avecImage = false): string
            {
                return 'Nouvelle réponse de test.';
            }
        };
        $this->app->instance(AssistantIAController::class, $controller);

        $response = $this->actingAs($apprenant)
            ->patchJson(route('assistant_message_update', $question), [
                'message' => 'Question corrigée',
            ]);

        $response->assertOk()
            ->assertJsonPath('reponse', 'Nouvelle réponse de test.');
        $this->assertDatabaseHas('assistant_messages', [
            'id' => $question->id,
            'content' => 'Question corrigée',
        ]);
        $this->assertDatabaseCount('assistant_messages', 2);
        $this->assertDatabaseMissing('assistant_messages', [
            'content' => 'Ancienne réponse',
        ]);
        $this->assertDatabaseMissing('assistant_messages', [
            'content' => 'Question qui dépend de la précédente',
        ]);
        $this->assertDatabaseHas('assistant_messages', [
            'role' => 'assistant',
            'content' => 'Nouvelle réponse de test.',
        ]);
    }

    public function test_la_page_assistant_restaure_les_messages_dans_des_bulles_compactes(): void
    {
        $apprenant = User::factory()->create();
        AssistantConversation::create(['user_id' => $apprenant->id])
            ->messages()
            ->createMany([
                ['role' => 'user', 'content' => 'Question courte'],
                ['role' => 'assistant', 'content' => str_repeat('Réponse longue ', 30)],
            ]);

        $response = $this->actingAs($apprenant)
            ->get(route('assistant_ia'));

        $response->assertOk()
            ->assertSee('class="message-content"', false)
            ->assertSee('data-edit-message', false)
            ->assertSee('id="assistant-mode"', false)
            ->assertSee('id="voice-input"', false)
            ->assertSee('Question courte')
            ->assertSee(str_repeat('Réponse longue ', 30));
    }
}
