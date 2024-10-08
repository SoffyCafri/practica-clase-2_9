<?php
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', [ContactoController::class, 'formulario']);
Route::get('/contacto/{tipo_persona?}', [ContactoController::class, 'formulario']);
Route::post('/contacto-recibe', [ContactoController::class, 'newContact']);

//{{}} es como un echo en php 