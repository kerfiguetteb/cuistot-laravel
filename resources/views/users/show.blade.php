@extends('base')
@section('content')
    <h1>{{$user->name}}</h1>
    <h3>les recette:
    </h3>
    <ul>
        @foreach($user->recettes as $recette)

           <li>
            <a href="{{ route('recettes.show', ['slug' => $recette->getSlug(), 'recette' => $recette->id]) }}">{{$recette->title}}</a>
           </li>

        @endforeach
    </ul>

@endsection
