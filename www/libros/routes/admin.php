<?php

use Illuminate\Support\Facades\Route;

Use App\http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\librosController;

    Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get('/list-users',[AdminController::class,'list_users']);
    Route::get('/list-libros',[AdminController::class,'list_libros']); 
    Route::resource('users',UserController::class);
    Route::resource("/libros",librosController::class);
    // Route::resource('permissions',PermissionController)
});

?>