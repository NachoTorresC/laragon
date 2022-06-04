<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\RecursoController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\UserRecursoController;

//añadir controladores de profesores recursos cursos

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
    return view('home');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// creo esta función para que si no eres administrador no puedes entrar
Route::group(['middleware'=>['can:adminPermission']],function(){  
Route::get('admin',[AdminController::class,'index']);
Route::resource('admin/users',UserController::class);
Route::resource("admin/recursos",RecursoController::class); 
Route::resource("admin/cursos",CursoController::class); 
Route::resource("admin/profesores",ProfesorController::class); 

});
// ruta de la vista que ve el usuario  

Route::group(['middleware'=>['can:userPermission']],function(){  
Route::get("recursos/index",[UserRecursoController::class, "mostrarRecursos"]); 
Route::get("recursos/{id}",[UserRecursoController::class, "mostrarRecurso"]); 


});
