<?php

use Symfony\Component\Routing\Route;
Use App\http\Controllers\Admin\AdminController;
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get('/list-users',[AdminController::class,'list_users']);
    Route::get('/list-projects',[AdminController::class,'list_projects']); 
});