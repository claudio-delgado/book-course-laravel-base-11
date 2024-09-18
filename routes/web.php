<?php
use App\Http\Controllers\PrimerControlador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('test', [PrimerControlador::class, 'index']);
Route::get('otro/{post?}/{otro?}', [PrimerControlador::class, 'otro']);
