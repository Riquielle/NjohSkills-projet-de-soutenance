@extends('Accueil.layouts.appf')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Assistant IA formateur</h2>
            <p class="text-muted mb-0">Générez des propositions pédagogiques, puis relisez, modifiez et validez-les avant publication.</p>
        </div>
        <button type="button" class="btn btn-success" data-assistant-toggle data-assistant-prompt="{{ $preset }}">
            <i class="fas fa-robot me-1"></i> Ouvrir l’assistant
        </button>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0"><div class="card-body">
                <h5><i class="fas fa-list-check text-primary me-2"></i>Évaluations</h5>
                <p class="text-muted">Demandez un QCM avec le niveau, le nombre de questions, le barème, les réponses correctes et les explications souhaités.</p>
                <button class="btn btn-outline-primary btn-sm" data-assistant-toggle data-assistant-prompt="Prépare un QCM modifiable pour une de mes formations. Demande-moi le module, le nombre de questions, le niveau et le barème.">Préparer un QCM</button>
            </div></div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0"><div class="card-body">
                <h5><i class="fas fa-file-lines text-success me-2"></i>Supports de cours</h5>
                <p class="text-muted">Transformez un support en plan de cours, fiche de synthèse, exemples, mises en situation ou guide de séance.</p>
                <button class="btn btn-outline-success btn-sm" data-assistant-toggle data-assistant-prompt="Aide-moi à préparer un guide de séance modifiable avec activités et durée estimée à partir de mes ressources.">Créer un guide de séance</button>
            </div></div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0"><div class="card-body">
                <h5><i class="fas fa-clone text-warning me-2"></i>Versions d’examen</h5>
                <p class="text-muted">Créez plusieurs variantes d’une évaluation ou un examen blanc, sans publier automatiquement le résultat.</p>
                <button class="btn btn-outline-warning btn-sm" data-assistant-toggle data-assistant-prompt="Propose deux versions différentes d’un examen blanc, avec durée, barème et compétences évaluées. Le contenu doit rester modifiable.">Créer des variantes</button>
            </div></div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('[data-assistant-prompt]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById('assistant-panel-input');
        if (input) input.value = button.dataset.assistantPrompt;
    });
});
</script>
@endsection
