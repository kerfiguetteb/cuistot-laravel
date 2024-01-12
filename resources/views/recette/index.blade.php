@extends('base')

@section('title', 'mes recettes')
@section('content')
    <h1>{{$recettes->title}}</h1>
    @foreach($recettes->ingredientsRecettes as $ingredient)
        <ul>

            <li>{{$ingredient->quantity}}-{{$ingredient->ingredient_name}}</li>

        </ul>
    @endforeach
@endsection
