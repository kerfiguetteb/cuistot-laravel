@extends('base')

@section('title', 'mes recettes')
@section('content')


        @foreach($recettes as $recette)
            <h3>Recettes</h3>
            <a href="{{ route('recettes.show', ['slug' => $recette->getSlug(), 'recette' => $recette]) }}"><h2>{{$recette->title}}</h2></a>
            <h3>Auteur</h3>
            <a href="{{ route('users.show', ['slug'=>$recette->user->getSlug(), 'user'=>$recette->user]) }}">{{$recette->user->name}}</a>
            <hr>
        @endforeach

    {{$recettes->links()}}
@endsection
