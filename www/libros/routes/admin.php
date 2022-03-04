<?php
Use App\http\Controllers\Admin\AdminController;

    Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get('/list-users',[AdminController::class,'list_users']);
    Route::get('/list-libros',[AdminController::class,'list_libros']); 
    Route::resource('users',UserController::class);
});

