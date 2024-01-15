<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRecetteFormRequest;
use App\Http\Requests\RecetteFormRequest;
use App\Models\Recette;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $recettes = Recette::paginate(16);

        return view('recettes.index',[
            'recettes' => $recettes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recette = new Recette();

        return view('recettes.create', [
            'recette' => $recette
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecetteFormRequest $requestRecette, IngredientRecetteFormRequest $requestIngredientRecette)
    {
        $recette = Recette::create($requestRecette->validated());
        $recette->categorie()->sync($requestRecette->validated('categorys'));
        $recette->ingrredientsRecettes();
        $recette->user()->sync(Auth::user());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( string $slug, Recette $recette): RedirectResponse | View
    {
        $expectedSlug = $recette->getSlug();

        if ($slug !== $expectedSlug) {
            return to_route('recettes.show', ['slug' => $expectedSlug, 'recette' => $recette]);
        }

        return view('recettes.show',[
            'recette'=> $recette
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recette $recette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recette $recette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recette $recette)
    {
        //
    }
}
