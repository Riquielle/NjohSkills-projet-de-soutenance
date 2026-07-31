<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AccueilController;
use App\http\Controllers\LoginController;
use App\http\Controllers\DashboardapController;
use App\http\Controllers\DashboardfoController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\LeconController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ApprenantQuizController;
use App\Http\Controllers\RessourceProgressionController;  
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\DashboardApprenantController;
use App\Http\Controllers\AssistantIAController;
use App\Http\Controllers\ProfilController;





Route::group(['middleware' => 'auth'],function () {
    Route::get('/dashboard_ap',[DashboardapController::class,'dashboard_ap'])->name('dashboard_ap');
    Route::get('/dashboard_fo',[DashboardfoController::class,'dashboard_fo'])->name('dashboard_fo');
    Route::get('/A_formation',[FormationController::class,'A_formation'])->name('A_formation');
    Route::post('/store',[FormationController::class,'store'])->name('store');
    Route::get('/Mes_formations',
    [FormationController::class,'Mes_formations'])
    ->name('Mes_formations');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::put('/formations/{id}', [FormationController::class, 'update'])
    ->name('formations.update');
    Route::delete('/formations/{id}', [FormationController::class, 'destroy'])
    ->name('formations.destroy');

    Route::get('/paiement/{id}', [PaiementController::class, 'paiement'])
        ->name('paiement');

    Route::post('/paiement/{id}', [PaiementController::class, 'store'])
        ->name('paiement.store');

    Route::get('/details_formations/{id}',[DashboardapController::class,'details_formations'])->name('details_formations');
    Route::get('/ma_formation/{id}', [ApprenantController::class, 'ma_Formation'])
    ->name('ma_formation');

    Route::get('/formations/{formation}/modules',
        [ModuleController::class,'module'])
        ->name('modules');
    
    Route::post('/formations/{formation}/modules', [ModuleController::class, 'store'])
        ->name('modules.store');

    Route::put('/modules/{module}', [ModuleController::class, 'update'])
        ->name('modules.update');

    Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])
        ->name('modules.destroy');
    
    Route::get('/modules/{module}/lecons',
        [LeconController::class,'lecons'])
        ->name('lecons');

    Route::post('/modules/{module}/lecons',
        [LeconController::class,'store'])
        ->name('lecons.store');

    Route::put('/lecons/{lecon}',
        [LeconController::class,'update'])
        ->name('lecons.update');

    Route::delete('/lecons/{lecon}',
        [LeconController::class,'destroy'])
        ->name('lecons.destroy');

    Route::get('/lecons/{lecon}/ressources',
        [RessourceController::class, 'ressources'])
        ->name('ressources');

    Route::post('/lecons/{lecon}/ressources',
        [RessourceController::class, 'store'])
        ->name('ressources.store');

    Route::put('/ressources/{ressource}',
        [RessourceController::class, 'update'])
        ->name('ressources.update');

    Route::delete('/ressources/{ressource}',
        [RessourceController::class, 'destroy'])
        ->name('ressources.destroy');
    
    Route::post('/ressource/{ressource}/terminer',
        [RessourceProgressionController::class,'terminer'])
        ->name('terminer');


        // ================= QUIZ =================

    Route::get('/module/{module}/quiz',
        [QuizController::class,'quiz'])
        ->name('quiz');

    Route::post('/module/{module}/quiz',
        [QuizController::class,'store'])
        ->name('quiz.store');

    Route::put('/quiz/{quiz}',
        [QuizController::class,'update'])
        ->name('quiz.update');

    Route::delete('/quiz/{quiz}',
        [QuizController::class,'destroy'])
        ->name('quiz.destroy');
    
    // ================= QUESTIONS =================

    Route::post('/quiz/{quiz}/question',
        [QuestionController::class,'store'])
        ->name('question.store');

    Route::put('/question/{question}',
        [QuestionController::class,'update'])
        ->name('question.update');

    Route::delete('/question/{question}',
        [QuestionController::class,'destroy'])
        ->name('question.destroy');

        // ================= monter et descendre =================

    Route::put('/question/{question}/monter',
    [QuestionController::class,'monter'])
    ->name('question.monter');

    Route::put('/question/{question}/descendre',
        [QuestionController::class,'descendre'])
        ->name('question.descendre');

    Route::post('/question/{question}/dupliquer',
        [QuestionController::class,'dupliquer'])
        ->name('question.dupliquer');


    Route::get('/quiz/{quiz}/passer',
        [ApprenantQuizController::class,'passer'])
        ->name('passer');

    Route::post('/quiz/{quiz}/passer',
        [ApprenantQuizController::class,'submit'])
        ->name('quiz.submit');

    Route::get('/quiz/resultat/{tentative}',
        [ApprenantQuizController::class,'resultat'])
        ->name('resultat');

    Route::get(
        '/certificat/{formation}',
        [CertificatController::class,'certificat']
    )->name('certificat');

    Route::get(
        '/dashboard/apprenant',
        [DashboardApprenantController::class,'dashboardapprenant']
    )->name('dashboardapprenant');

    Route::get('/mesa_formations',
        [DashboardApprenantController::class,'mesa_Formations']
    )->name('mesa_formations');

    Route::get('/ma_progression',
        [DashboardApprenantController::class,'ma_progression']
    )->name('ma_progression');

    Route::get('/mes_certificats',
        [DashboardApprenantController::class,'mes_certificats']
    )->name('mes_certificats');

    Route::get('/assistant_ia',
        [AssistantIAController::class,'assistant_ia']
    )->name('assistant_ia');


    Route::post('/assistant_ia/message',
        [AssistantIAController::class,'assistant_message']
    )->name('assistant_message');

    Route::get('/formateur/apprenants',
        [DashboardfoController::class,'mes_apprenants']
    )->name('mes_apprenants');

    Route::get(
        '/formateur/apprenants/{inscription}',
        [DashboardfoController::class,'voir_ap']
    )->name('voir_ap');

    Route::get(
        '/historique-quiz/{quiz}',
        [QuizController::class,'historique']
    )->name('historique');

    // Apprenant
    Route::get('/mon-profil', [ProfilController::class,'profil'])
        ->name('profil');

    // Formateur
    Route::get('/formateur/profil', [ProfilController::class,'profil_formateur'])
        ->name('profil_formateur');

        // Modification profil apprenant
    Route::post('/mon-profil/update', 
        [ProfilController::class,'profil_update'])
        ->name('profil_update');


    // Modification profil formateur
    Route::post('/formateur/profil/update',
        [ProfilController::class,'profil_formateur_update'])
        ->name('profil_formateur_update');

    Route::post('/mon-profil/photo/delete',
        [ProfilController::class,'supprimer_photo'])
        ->name('supprimer_photo');

    Route::post('/mon-profil/password',
        [ProfilController::class,'changer_password'])
        ->name('changer_password');

        // Suppression photo formateur
    Route::post('/formateur/photo/delete',
        [ProfilController::class,'supprimer_photo_formateur'])
        ->name('supprimer_photo_formateur');

    Route::post('/formateur/password/update',
        [ProfilController::class,'modifier_password_formateur'])
        ->name('modifier_password_formateur');
});





    Route::get('/',[AccueilController::class,'index'])->name('home');
    Route::get('/about',[AccueilController::class,'about'])->name('about');
    Route::get('/home2',[AccueilController::class,'home2'])->name('home2');
    Route::get('/formations',[AccueilController::class,'formations'])->name('formations');
    
    Route::get('/sign_up/apprenant',[LoginController::class,'sign_upApprenant'])->name('sign_up.apprenant');
    Route::post('/sign_up/processsign_upApprenant',[LoginController::class,'processsign_upApprenant'])->name('processsign_upApprenant');
    Route::post('/sign_up/processsign_upFormateur',[LoginController::class,'processsign_upFormateur'])->name('processsign_upFormateur');
    Route::get('sign_up/formateur', [LoginController::class, 'sign_upFormateur'])
    ->name('sign_up.formateur');
    
    Route::get('/sign_in',[LoginController::class,'sign_in'])->name('sign_in');
    

    Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');




