<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user){
            $user->recettes()->saveMany(Recette::factory(10))->create([
                'user_id' => $user->id,
                'category_id' => random_int(1,3)

            ]);
        });

        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
        ])->each(function ($user){
            $user->recettes()->saveMany(Recette::factory(10))->create([
                'user_id' => $user->id,
                'category_id' => random_int(1,3)

            ]);
        });
    }
}
