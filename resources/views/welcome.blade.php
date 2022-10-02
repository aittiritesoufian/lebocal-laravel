<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page_title', 'Questionnaire')</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        @stack('styles')
    </head>
    <body class="antialiased">
        <div class="container">
            <header class="d-flex justify-content-center py-3">
              <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('Home') }}" class="nav-link" aria-current="page">Accueil</a></li>
                @auth
                    @if(Auth::user()->isAdmin)
                        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                    @endif
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Déconnexion</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Connexion</a></li>
                @endauth
              </ul>
            </header>
        </div>
        <main class="container">
            <h1>@yield('page_title', 'Page')</h1>
            @include('flashmsg')
            @yield('content', 'No content found')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
