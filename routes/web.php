<?php

use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfileController;

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
    Route::post('/new', 'create' )->name('create')->middleware('auth');
    Route::post('/new', 'store')->middleware('auth');
});

Route::get('/{slug}-{user}', [UserController::class, 'show'])->name('users.show')->where([
    'slug' =>$slugRegex,
    'user'=>$idRegex
]);
Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);

Route::prefix('/profile')->name('profile.')->middleware('auth')->controller(ProfileController::class)->group(function (){
    Route::get('/', 'index')->name('index');

});
