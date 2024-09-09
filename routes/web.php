<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\model\contacto;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacto', function () {
    return view('formulario-contacto');
});
Route::post('/contacto-recibe', function (Request $request) {
    //dd($request->all(), $request->nombre); 
$request->validate([

    'nombre' => 'required|min:3|max:255',
    'correo' => 'required|email',
    'mensaje' => 'required|min:10',

]);

    $contacto= new $contacto();
    $contacto ->nombre = $request->nombre;
    $contacto ->correo = $request->correo;
    $contacto ->mensaje = $request->mensaje;
    $contacto ->save();

    return redirect('/contacto');
});