<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>


<body>

@php
    $routeName = request()->route()->getName();
@endphp


<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_starts_with($routeName, 'recettes.')]) aria-current="page" href="{{ route('recettes.index') }}">Recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                        @method("delete")
                        @csrf
                        <button class="nav-link">Se déconnecter</button>
                    </form>
                @endauth
                @guest
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
