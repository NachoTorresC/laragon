<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ContactaMail;
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
    return view('welcome2');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('contacta',function(){
    $correo=new ContactaMail;

    Mail::to('vyd15559@educastur.es')->send($correo);

    return "mensaje enviado";
});*/

Route::get('catalogo', [\App\Http\Controllers\HomeController::class, 'catalogo']);
Route::get('contacta', [\App\Http\Controllers\ContactaController::class, 'index'])->name('contacta.index');
Route::post('contacta', [\App\Http\Controllers\ContactaController::class, 'store'])->name('contacta.store');