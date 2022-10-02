@extends('welcome')

@section('page_title')
Connexion
@endsection

@section('content')
<form method="POST" action="{{ route('authenticate_form') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email"
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ $email }}"
            required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input id="password"
            type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            required>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">Connexion</button>
    </div>
</form>
@endsection
