<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryName = ['Saler', 'Sucrer', 'Autre'];

        for ($i=0; $i<count($categoryName) ; $i++){
            DB::table('categorys')->insert([
                'name' => $categoryName[$i]
            ]);
        }



    }
}
