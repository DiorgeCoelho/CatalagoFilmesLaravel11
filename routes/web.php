<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;

Route::get('/fil', [FilmeController::class, 'films']);
Route::get('/films/{id}', [FilmeController::class, 'show'])->name('films.show');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/t', function () {
    return view('teste');
});
