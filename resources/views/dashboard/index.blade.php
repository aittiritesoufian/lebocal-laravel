@extends('welcome')

@section('page_title')
Dashboard
@endsection

@section('content')
    <div class="col col-12">
        <form method="GET" action="{{ route('dashboard') }}">
            <div class="mb-3">
                <label for="search" class="form-label">Recherche par adresse mail :</label>
                <input type="email" class="form-control" id="search" name="search" value="{{ $search }}" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <button class="btn btn-success">Rechercher une adresse mail</button>
                @if($search)
                    <a class="btn btn-default" href="{{ route('dashboard') }}">Réinitialiser</a>
                @endif
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Question 1</th>
                <th>Question 2</th>
                <th>Question 3</th>
                <th>Question 4</th>
                <th>Question 5</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer->question1 }}</td>
                <td>{{ $answer->question2 }}</td>
                <td>{{ $answer->question3 }}</td>
                <td>{{ $answer->question4 }}</td>
                <td>{{ $answer->question5 }}</td>
                <td>{{ $answer->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
