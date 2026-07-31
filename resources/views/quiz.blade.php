@extends('Accueil.layouts.appf')

@section('content')

<div class="container py-5">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif


    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="d-flex align-items-center">

            <a href="{{ route('modules',$module->formation_id) }}"
               class="btn btn-light border rounded-circle me-3"
               style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

                <i class="fas fa-arrow-left"></i>

            </a>

            <div>

                <h2 class="fw-bold">

                    Quiz du module

                </h2>

                <p class="text-muted">

                    {{ $module->titre }}

                </p>

            </div>

        </div>

        @if(!$quiz)

            <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#addQuiz">

                + Créer le quiz

            </button>

        @endif

    </div>



    @if($quiz)

    <div class="card shadow border-0">

    <div class="card-body">

    <div class="d-flex justify-content-between align-items-start">

    <div>

    <h3 class="fw-bold">

    {{ $quiz->titre }}

    </h3>

    <p class="text-muted">

    {{ $quiz->description }}

    </p>

    <span class="badge bg-success">

    Note minimale :

    {{ $quiz->note_minimale }} %

    </span>

    </div>

   <div>

        <button class="btn btn-warning"
                data-bs-toggle="modal"
                data-bs-target="#editQuiz">

            <i class="fas fa-edit"></i>

            Modifier

        </button>

        <button class="btn btn-danger"
                data-bs-toggle="modal"
                data-bs-target="#deleteQuiz">

            <i class="fas fa-trash"></i>

            Supprimer

        </button>

    </div>


    </div>

    <hr>

    <div class="d-flex justify-content-between mb-4">

    <h4>

    Questions

    </h4>

    <button class="btn btn-success"

    data-bs-toggle="modal"

    data-bs-target="#addQuestion">

    + Ajouter une question

    </button>

    @php

    $totalQuestions = $quiz->questions->count();

    @endphp

    </div>

    @forelse($quiz->questions as $question)

        <div class="card mb-4 shadow-sm border-0">

        <div class="card-body">

        <div class="d-flex justify-content-between">

        <div>

        <h5 class="fw-bold">

            Question {{ $question->ordre }}

            <span class="badge bg-primary">

            {{ $question->points }} pt{{ $question->points > 1 ? 's' : '' }}

            </span>

        </h5>

        <p>

        {{ $question->question }}

        </p>

        <div class="mt-2">

            <span class="badge bg-primary">

                {{ $question->points }} point(s)

            </span>

            <span class="badge bg-secondary">

                {{ $question->reponses->count() }} réponse(s)

            </span>

        </div>

        </div>

        <div class="mt-3">

            @foreach($question->reponses as $reponse)

                <div class="form-check mb-2">

                    <input
                        class="form-check-input"
                        type="radio"
                        disabled
                        {{ $reponse->est_correcte ? 'checked' : '' }}>

                    <label class="form-check-label">

                        {{ $reponse->reponse }}

                    </label>

                </div>

            @endforeach
       <div class="text-end">

        <button
            class="btn btn-warning btn-sm mb-2"
            data-bs-toggle="modal"
            data-bs-target="#editQuestion{{ $question->id }}">

            Modifier

        </button>


        <form method="POST"
            action="{{ route('question.dupliquer',$question->id) }}"
            class="d-inline">

            @csrf

            <button class="btn btn-info btn-sm">

                <i class="fas fa-copy"></i>

                Dupliquer

            </button>

        </form>

        <button
            class="btn btn-danger btn-sm mb-2"
            data-bs-toggle="modal"
            data-bs-target="#deleteQuestion{{ $question->id }}">

            Supprimer

        </button>

        <br>

        <div class="mt-2">

            {{-- Bouton Monter --}}
            @if($question->ordre > 1)

                <form method="POST"
                    action="{{ route('question.monter',$question->id) }}"
                    class="d-inline">

                    @csrf
                    @method('PUT')

                    <button class="btn btn-outline-primary btn-sm">

                        ↑ Monter

                    </button>

                </form>

            @endif


            {{-- Bouton Descendre --}}
            @if($question->ordre < $totalQuestions)

                <form method="POST"
                    action="{{ route('question.descendre',$question->id) }}"
                    class="d-inline">

                    @csrf
                    @method('PUT')

                    <button class="btn btn-outline-primary btn-sm">

                        ↓ Descendre

                    </button>

                </form>

            @endif

        </div>

    </div>

        </div>

        </div>

        </div>

        </div>


       


          <!-- MODAL MODIFIER UNE QUESTION -->

        <!-- ================= MODIFIER UNE QUESTION ================= -->

            @php

            $A = $question->reponses[0] ?? null;
            $B = $question->reponses[1] ?? null;
            $C = $question->reponses[2] ?? null;
            $D = $question->reponses[3] ?? null;

            @endphp

            <div class="modal fade"
                id="editQuestion{{ $question->id }}"
                tabindex="-1">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <form method="POST"
                            action="{{ route('question.update',$question->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="modal-header">

                                <h5 class="fw-bold">

                                    Modifier la question

                                </h5>

                                <button class="btn-close"
                                        data-bs-dismiss="modal">
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="mb-4">

                                    <label class="fw-semibold">

                                        Question

                                    </label>

                                    <textarea
                                        name="question"
                                        rows="3"
                                        class="form-control"
                                        required>{{ $question->question }}</textarea>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label>

                                            Réponse A

                                        </label>

                                        <input
                                            type="text"
                                            name="reponseA"
                                            class="form-control"
                                            value="{{ $A?->reponse }}"
                                            required>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label>

                                            Réponse B

                                        </label>

                                        <input
                                            type="text"
                                            name="reponseB"
                                            class="form-control"
                                            value="{{ $B?->reponse }}"
                                            required>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label>

                                            Réponse C

                                        </label>

                                        <input
                                            type="text"
                                            name="reponseC"
                                            class="form-control"
                                            value="{{ $C?->reponse }}"
                                            required>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label>

                                            Réponse D

                                        </label>

                                        <input
                                            type="text"
                                            name="reponseD"
                                            class="form-control"
                                            value="{{ $D?->reponse }}"
                                            required>

                                    </div>

                                </div>

                                <hr>

                                <h6 class="fw-bold">

                                    Bonne réponse

                                </h6>

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="bonne"
                                        value="A"
                                        {{ $A && $A->est_correcte ? 'checked' : '' }}>

                                    <label class="form-check-label">

                                        Réponse A

                                    </label>

                                </div>

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="bonne"
                                        value="B"
                                        {{ $B && $B->est_correcte ? 'checked' : '' }}>

                                    <label class="form-check-label">

                                        Réponse B

                                    </label>

                                </div>

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="bonne"
                                        value="C"
                                        {{ $C && $C->est_correcte ? 'checked' : '' }}>

                                    <label class="form-check-label">

                                        Réponse C

                                    </label>

                                </div>

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="bonne"
                                        value="D"
                                        {{ $D && $D->est_correcte ? 'checked' : '' }}>

                                    <label class="form-check-label">

                                        Réponse D

                                    </label>

                                </div>

                                <hr>

                                <div class="mt-3">

                                    <label class="fw-semibold">

                                        Nombre de points

                                    </label>

                                    <input
                                        type="number"
                                        min="1"
                                        name="points"
                                        value="{{ $question->points }}"
                                        class="form-control">

                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">

                                    Annuler

                                </button>

                                <button class="btn btn-warning">

                                    <i class="fas fa-save me-2"></i>

                                    Modifier

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

         <!-- MODAL SUPPRIMER UNE QUESTION -->

        <div class="modal fade"
            id="deleteQuestion{{ $question->id }}"
            tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form method="POST"
                        action="{{ route('question.destroy',$question->id) }}">

                        @csrf
                        @method('DELETE')

                        <div class="modal-header">

                            <h5>Supprimer la question</h5>

                            <button class="btn-close"
                                    data-bs-dismiss="modal"></button>

                        </div>

                        <div class="modal-body">

                            Voulez-vous supprimer cette question ?

                        </div>

                        <div class="modal-footer">

                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">

                                Annuler

                            </button>

                            <button class="btn btn-danger">

                                Supprimer

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

         @empty

            <div class="alert alert-info">

                Aucune question n'a encore été ajoutée à ce quiz.

            </div>

    @endforelse

    </div>

    </div>

    @else

    <div class="alert alert-info">

    Aucun quiz n'a encore été créé pour ce module.

    </div>

    @endif

</div>


<!-- MODAL AJOUTER -->

<div class="modal fade"

id="addQuiz"

tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<form

method="POST"

action="{{ route('quiz.store',$module->id) }}">

@csrf

<div class="modal-header">

<h5>

Créer un quiz

</h5>

<button

class="btn-close"

data-bs-dismiss="modal">

</button>

</div>

<div class="modal-body">

<div class="mb-3">

<label>

Titre

</label>

<input

type="text"

name="titre"

class="form-control">

</div>

<div class="mb-3">

<label>

Description

</label>

<textarea

name="description"

class="form-control"

rows="4">

</textarea>

</div>

<div class="mb-3">

<label>

Note minimale

</label>

<input

type="number"

name="note_minimale"

value="70"

class="form-control">

</div>

</div>

<div class="modal-footer">

<button

type="button"

class="btn btn-secondary"

data-bs-dismiss="modal">

Annuler

</button>

<button

class="btn btn-primary">

Créer

</button>

</div>

</form>

</div>

</div>

</div>

<!-- MODAL MODIFIER -->

@if($quiz)

<div class="modal fade"
     id="editQuiz"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="POST"
                  action="{{ route('quiz.update',$quiz->id) }}">

                @csrf
                @method('PUT')

                <div class="modal-header">

                    <h5>Modifier le quiz</h5>

                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Titre</label>

                        <input type="text"
                               name="titre"
                               class="form-control"
                               value="{{ $quiz->titre }}">

                    </div>

                    <div class="mb-3">

                        <label>Description</label>

                        <textarea name="description"
                                  rows="4"
                                  class="form-control">{{ $quiz->description }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label>Note minimale (%)</label>

                        <input type="number"
                               name="note_minimale"
                               value="{{ $quiz->note_minimale }}"
                               class="form-control">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Annuler

                    </button>

                    <button class="btn btn-warning">

                        Modifier

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endif

<!-- MODAL SUPPRIMER -->

@if($quiz)

<div class="modal fade"
     id="deleteQuiz"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="POST"
                  action="{{ route('quiz.destroy',$quiz->id) }}">

                @csrf
                @method('DELETE')

                <div class="modal-header">

                    <h5>Supprimer le quiz</h5>

                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    Voulez-vous vraiment supprimer ce quiz ?

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Annuler

                    </button>

                    <button class="btn btn-danger">

                        Supprimer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

    <!-- MODAL AJOUTER UNE QUESTION -->

<div class="modal fade" id="addQuestion" tabindex="-1">

    <div class="modal-dialog modal-lg">

    <div class="modal-content">

    <form method="POST"
        action="{{ route('question.store',$quiz->id) }}">

    @csrf

    <div class="modal-header">

    <h5>Nouvelle question</h5>

    </div>

    <div class="modal-body">

    <div class="mb-3">

    <label>Question</label>

    <textarea
    name="question"
    rows="3"
    class="form-control"
    required></textarea>

    </div>

    <div class="row">

    <div class="col-md-6 mb-3">

    <label>Réponse A</label>

    <input
    type="text"
    name="reponseA"
    class="form-control"
    required>

    </div>

    <div class="col-md-6 mb-3">

    <label>Réponse B</label>

    <input
    type="text"
    name="reponseB"
    class="form-control"
    required>

    </div>

    <div class="col-md-6 mb-3">

    <label>Réponse C</label>

    <input
    type="text"
    name="reponseC"
    class="form-control"
    required>

    </div>

    <div class="col-md-6 mb-3">

    <label>Réponse D</label>

    <input
    type="text"
    name="reponseD"
    class="form-control"
    required>

    </div>

    </div>

    <div class="mb-3">

    <label>Bonne réponse</label>

    <div class="form-check">

    <input class="form-check-input"
    type="radio"
    name="bonne"
    value="A"
    checked>

    <label class="form-check-label">

    Réponse A

    </label>

    </div>

    <div class="form-check">

    <input class="form-check-input"
    type="radio"
    name="bonne"
    value="B">

    <label>

    Réponse B

    </label>

    </div>

    <div class="form-check">

    <input class="form-check-input"
    type="radio"
    name="bonne"
    value="C">

    <label>

    Réponse C

    </label>

    </div>

    <div class="form-check">

    <input class="form-check-input"
    type="radio"
    name="bonne"
    value="D">

    <label>

    Réponse D

    </label>

    </div>

    </div>

    <div class="mb-3">

    <label>Points</label>

    <input
    type="number"
    name="points"
    value="1"
    class="form-control">

    </div>

    </div>

    <div class="modal-footer">

    <button
    class="btn btn-success">

    Enregistrer

    </button>

    </div>

    </form>

    </div>

    </div>

</div>

@endif


<!-- MODAL AJOUTER UNE QUESTION -->





@endsection 