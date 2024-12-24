<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\PrimerControlador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('test', [PrimerControlador::class, 'index']);
Route::get('otro/{post?}/{otro?}', [PrimerControlador::class, 'otro']);

Route::group(['prefix' => "dashboard"], function(){
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class
    ]);
});