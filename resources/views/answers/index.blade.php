@extends('welcome')

@section('page_title')
Questionnaire
@endsection

@section('content')
    {{-- Création de zones de flash message dans des blocs importés --}}
    @error('question1', 'question2', 'question3', 'question4', 'question5', 'email')
        <div class="alert alert-danger">{{ $errorMsg }}</div>
    @enderror
    {{-- création d'un formulaire HTMl --}}
    <form method="POST" action="{{ route('Home') }}">
        {{-- Implémentation du CSRF --}}
        @csrf
        <div class="mb-3">
            <label for="question1" class="form-label">Première question de sondage ?</label>
            <input id="question1"
                type="text"
                name="question1"
                class="form-control @error('question1') is-invalid @enderror"
                value="{{ $question1 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="question2">Seconde question de sondage ?</label>
            <input id="question2"
                type="text"
                name="question2"
                class="form-control @error('question2') is-invalid @enderror"
                value="{{ $question2 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="question3">Troisième question de sondage ?</label>
            <input id="question3"
                type="text"
                name="question3"
                class="form-control @error('question3') is-invalid @enderror"
                value="{{ $question3 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="question4">Quatrième question de sondage ?</label>
            <input id="question4"
                type="text"
                name="question4"
                class="form-control @error('question4') is-invalid @enderror"
                value="{{ $question4 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="question5">Cinquième question de sondage ?</label>
            <input id="question5"
                type="text"
                name="question5"
                class="form-control @error('question5') is-invalid @enderror"
                value="{{ $question5 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Votre adresse mail</label>
            <input id="email"
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ $email }}"
            required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>
    {{-- appel des fonctions de chargement de routes pour l'action --}}
    {{-- préremplissage du formulaire avec les données en cas d'exception levée --}}
@endsection
