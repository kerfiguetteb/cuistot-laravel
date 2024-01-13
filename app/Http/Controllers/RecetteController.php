<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
