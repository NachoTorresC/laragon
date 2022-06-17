<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserCursoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\UserRecursoController;
use App\Http\Controllers\Admin\RecursoController;
use App\Http\Controllers\Admin\ProfesorController;

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
//Route::resource("admin/profesores",ProfesorController::class); 

});

// rutas de la vista que ve el usuario invitado
Route::group(['middleware'=>['can:userPermission']],function(){  
    
Route::get("recursos/index",[UserRecursoController::class, "mostrarRecursos"]); 
Route::get("recursos/{id}",[UserRecursoController::class, "mostrarRecurso"]); 
Route::get("recursos/{id}",[UserRecursoController::class, "mostrarRecurso"]); 


//paypal
Route::get('processPaypal', [PaymentController::class, 'processPaypal'])->name('processPaypal');
Route::get('processSuccess', [PaymentController::class, 'processSuccess'])->name('processSuccess');
Route::get('processCancel', [PaymentController::class, 'processCancel'])->name('processCancel');

Route::get("miembroPremium/index",[PremiumController::class, "mostrarVistaPremium"])->name('miembroPremium/index'); 

//descargas
Route::get('recursos/download/{descargable}',[UserRecursoController::class,'download'])->name('download');
});



// ruta de la vista que ve el usuario premium

Route::group(['middleware'=>['can:userPremium']],function(){  

Route::get("shop/products",[ProductoController::class, "productList"]); 
Route::get("cursos/index",[UserCursoController::class, "mostrarCursos"]); 
Route::get("cursos/{id}",[UserCursoController::class, "mostrarCurso"]); 




// carrito de compra 

Route::get('shop', [ProductoController::class, 'productList'])->name('products.list');
Route::get('shop/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('shop/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});
