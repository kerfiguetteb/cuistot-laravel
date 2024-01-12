<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsRecettesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = Ingredient::all();
        $recettes = Recette::all();

        foreach ($recettes as $recette){
            foreach ($ingredients as $ingredient){
                DB::table('ingredient_recettes')->insert(
                    [
                        'quantity' => rand(0, 100),
                        'ingredient_name' => $ingredient->name,
                        'ingredient_id' => $ingredient->id,
                        'recette_id' => $recette->id,
                    ]
                );
            }
        }
    }
}
