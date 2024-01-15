@extends('base')
@section('content')
    <a href="{{ route('recettes.create') }}">Ajouter une recette</a>
    <ul>
        @foreach($user->recettes as $recette)
            <li>{{$recette->title}}</li>
        @endforeach
    </ul>

@endsection
