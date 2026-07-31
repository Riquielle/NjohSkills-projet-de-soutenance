@extends('Accueil.layouts.appp')

@section('content')

<div class="container py-5">
    <div class="card shadow border-0">

             

            <div class="card-header bg-primary text-white">
                  <h3 class="mb-1">{{ $quiz->titre }}</h3>
                  <p class="mb-0">{{ $quiz->description }}</p>
            </div>

            <div class="card-body">

            <form method="POST" action="{{ route('quiz.submit', $quiz->id) }}" id="quizForm">
                @csrf

                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <span>
                            Question <span id="numeroQuestion">1</span> / {{ $quiz->questions->count() }}
                        </span>
                        <span id="pourcentage">0 %</span>
                    </div>

                    <div class="progress mt-2">
                        <div id="progressBar" class="progress-bar bg-success" style="width:0%"></div>
                    </div>
                </div>

                @foreach($quiz->questions as $question)
                    <div class="question" @if(!$loop->first) style="display:none" @endif>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="fw-bold mb-4">{{ $question->question }}</h5>

                                @foreach($question->reponses as $reponse)
                                    <div class="form-check mb-3">
                                        <input 
                                            class="form-check-input" 
                                            type="radio" 
                                            name="reponse[{{ $question->id }}]" 
                                            value="{{ $reponse->id }}">
                                        <label class="form-check-label">
                                            {{ $reponse->reponse }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4 d-flex justify-content-between">
                    <button type="button" id="precedent" class="btn btn-secondary" style="display:none">
                        ← Précédent
                    </button>

                    <button type="button" id="suivant" class="btn btn-primary ms-auto">
                        Suivant →
                    </button>

                    <button type="submit" id="terminer" class="btn btn-success ms-auto" style="display:none">
                        Terminer le quiz
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const questions = document.querySelectorAll('.question');
    let index = 0;

    const btnSuivant = document.getElementById('suivant');
    const btnPrecedent = document.getElementById('precedent');
    const btnTerminer = document.getElementById('terminer');
    const numero = document.getElementById('numeroQuestion');
    const progress = document.getElementById('progressBar');
    const pourcentage = document.getElementById('pourcentage');

    function afficherQuestion() {
      questions.forEach((q, i) => {
            q.style.display = (i === index) ? 'block' : 'none';
      });

      numero.innerText = index + 1;

      // Progression basée sur le nombre de questions franchies (commence à 0 %)
      let p = (index / questions.length) * 100;
      
      progress.style.width = p + "%";
      pourcentage.innerText = Math.round(p) + " %";

      btnPrecedent.style.display = (index === 0) ? 'none' : 'inline-block';

      if (index === questions.length - 1) {
            btnSuivant.style.display = 'none';
            btnTerminer.style.display = 'inline-block';
      } else {
            btnSuivant.style.display = 'inline-block';
            btnTerminer.style.display = 'none';
      }
      }

    btnSuivant.addEventListener('click', () => {
        const questionActuelle = questions[index];
        const cochee = questionActuelle.querySelector('input[type=radio]:checked');

        if (!cochee) {
            alert("Veuillez sélectionner une réponse avant de continuer.");
            return;
        }

        index++;
        afficherQuestion();
    });

    btnPrecedent.addEventListener('click', () => {
        if (index > 0) {
            index--;
            afficherQuestion();
        }
    });

    afficherQuestion();
});
</script>
@endpush