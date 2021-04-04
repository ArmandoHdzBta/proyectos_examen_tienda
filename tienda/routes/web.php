<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Route::get('/home', [UsuarioController::class, 'home'])->name('home');

Route::get('/log-in', [UsuarioController::class, 'login'])->name('login');
Route::post('/log-in', [UsuarioController::class, 'verificarUsuario'])->name('verificarUsuario');

Route::get('/registro', [UsuarioController::class, 'registro'])->name('registro');
Route::post('/registro', [UsuarioController::class, 'registrar'])->name('registrar');

Route::get('/salir', [UsuarioController::class, 'signout'])->name('sign-out');

Route::prefix('/usuario')->middleware('VerificarUsuario')->group(function (){
	Route::get('/perfil/{id}/{nombre}', [UsuarioController::class, 'perfil'])->name('perfil');
	Route::post('/update', [UsuarioController::class, 'updateUsuario'])->name('updateUsuario');

	Route::get('/addProducto', [ProductoController::class, 'addProducto'])->name('addProducto');
	Route::post('/addProducto', [ProductoController::class, 'addProductoNuevo'])->name('addProductoNuevo');
	Route::get('/productos', [ProductoController::class, 'productos'])->name('productos');
	Route::post('/obtenerDatosProducto/{idproducto?}', [ProductoController::class, 'obtenerDatosProducto'])->name('obtenerDatosProducto');
	Route::post('/updateProducto', [ProductoController::class, 'updateProducto'])->name('updateProducto');

	Route::post('/addCarrito/{idproducto?}/{cantidad?}', [CarritoController::class, 'addCarrito'])->name('addCarrito');
	Route::post('/eliminarProductoCarrito/{id?}', [CarritoController::class, 'eliminarProductoCarrito'])->name('eliminarProductoCarrito');

	Route::get('/total-pedidos', [VentaController::class, 'pedidos'])->name('pedidos');
	Route::get('/mis-pedidos', [VentaController::class, 'misPedidos'])->name('misPedidos');

	Route::get('/mi-carrito', [CarritoController::class, 'miCarrito'])->name('miCarrito');
	Route::post('/hacer-compra/{idusuario?}', [VentaController::class, 'hacerCompra'])->name('hacerCompra');
});