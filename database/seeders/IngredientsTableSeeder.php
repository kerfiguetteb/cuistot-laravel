<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $ingredientName = [
           'farine',
           'sel',
           'sucre',
           'lait',
           'poivre',
           'levure'
       ];

       for ($i=0; $i<count($ingredientName); $i++ ){
           DB::table('ingredients')->insert(
               [
                   'name'=> $ingredientName[$i]
               ]
           );
       }
    }
}
