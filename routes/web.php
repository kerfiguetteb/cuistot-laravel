<?php

use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';


Route::prefix('/recettes')->name('recettes.')->controller(RecetteController::class)->group(function () use($idRegex, $slugRegex){
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{recette}', 'show')->where([
        'recette' => $idRegex,
        'slug' => $slugRegex
    ])->name('show');
});

Route::get('/{slug}-{user}', [UserController::class, 'show'])->name('users.show')->where([
    'slug' =>$slugRegex,
    'user'=>$idRegex
]);
