<?php

use Illuminate\Support\Facades\Route;
use \App\http\controllers\ProjectController;
use \App\http\controllers\HomeController; // si nos da error quitar ese use( solo se puso por seguir el video).


use \App\Mail\ContactaMail;
use Illuminate\Support\Facades\Mail;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/saludos', function () {
    return view('saludos');
});Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("projects",ProjectController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('contacta',function(){
$correo=n
Mail::to('vyd15559@educastur.es')->send($correo);
return("mensaje enviado");
});*/

Route::get('contacta', [\App\Http\Controllers\ContactaController::class, 'index'])->name('contacta.index');
Route::post('contacta', [\App\Http\Controllers\ContactaController::class, 'store'])->name('contacta.store');

