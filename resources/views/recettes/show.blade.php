@extends('base')
@section('title', $recette->title)
@section('content')



        <h3>{{$recette->title}}</h3>
        <a href="{{ route('recettes.index') }}">revenir</a>
        <ul>
            @foreach($recette->ingredientsRecettes as $ingredientRecette)
                <li>{{$ingredientRecette->quantity}} gramme de {{$ingredientRecette->ingredient->name}}</li>
            @endforeach
        </ul>
        <p>{{$recette->content}}</p>
        <h3>Auteur</h3>
        <a href="{{ route('users.show', ['slug'=>$recette->user->getSlug(), 'user'=>$recette->user]) }}">{{$recette->user->name}}</a>
        <hr>
@endsection
