<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


Route::group(['middleware'=>['can:admin']],function(){  
Route::get('admin',[AdminController::class,'index']);
});