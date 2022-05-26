<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

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
Route::group(['middleware'=>['can:adminPermission']],function(){  
Route::get('admin',[AdminController::class,'index']);
Route::resource('admin/users',UserController::class);
/* Route::resource("admin/recursos",librosController::class); 
Route::resource("admin/cursos",librosController::class); 
Route::resource("admin/profesores",librosController::class); */
});

