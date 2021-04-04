<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\UsuarioPDFController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\UsuarioController;
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
    return redirect()->route('welcome');
});
Route::get('/welcome', [AdministradorController::class, 'welcome'])->name('welcome');

Route::get('/login', [AdministradorController::class, 'login'])->name('login');
Route::get('/registrarse', [AdministradorController::class, 'registrar'])->name('registrar');

Route::post('/registrarse', [AdministradorController::class, 'registro'])->name('registroForm');
Route::post('/login', [AdministradorController::class, 'verificarCredenciales'])->name('verificarCredenciales');

//usuario
Route::get('/usuario/login', [UsuarioController::class, 'login'])->name('usuario.login');
Route::post('/usuario/login', [UsuarioController::class, 'verificarCredenciales'])->name('usuario.verificarCredenciales');
Route::get('/usuario/registrarse', [UsuarioController::class, 'registrar'])->name('usuario.registrar');
Route::post('/usuario/registrarse', [UsuarioController::class, 'registro'])->name('usuario.registroForm');

Route::get('/cerrarsesion-admin', [AdministradorController::class, 'cerrarSesion'])->name('admin.cerrarSesion');
Route::get('/cerrarsesion', [UsuarioController::class, 'cerrarSesion'])->name('usuario.cerrarSesion');

Route::prefix('/administrador')->middleware('AdministradorVerificar')->group(function (){
	Route::get('/home', [AdministradorController::class, 'home'])->name('admin.home');
	//examen
	Route::get('/crear-examen', [ExamenController::class, 'viewExamen'])->name('admin.viewExamen');
	Route::post('/crear-examen', [ExamenController::class, 'crearExamen'])->name('admin.crearExamen');
	Route::post('/crear-examen', [ExamenController::class, 'crearPreguntas'])->name('admin.examen.preguntas');
	Route::get('/examenes', [ExamenController::class, 'viewExamenAll'])->name('admin.viewExamenAll');
	Route::get('/examen/{id}', [ExamenController::class, 'verExamen'])->name('admin.verExamen');
	//pdf
	Route::get('/usuarioPDF/{id}', [UsuarioPDFController::class, 'PDF'])->name('usuario.downPDF');
});

Route::prefix('/usuario')->middleware('UsuarioVerificar')->group(function (){
	Route::get('/home', [UsuarioController::class, 'usuarioHome'])->name('usuario.home');
	Route::get('/examenes', [UsuarioController::class, 'usuarioViewExamenAll'])->name('usuario.viewExamenAll');
	Route::get('/contestar/{id}', [UsuarioController::class, 'contestarExamen'])->name('usuario.contestarExamen');
	Route::post('/verificar-respuestas', [RespuestaController::class, 'verificarRespuestas'])->name('usuario.verificarRespuestas');
	Route::get('/mis-examenes', [UsuarioController::class, 'misExamenes'])->name('usuario.misExamenes');
	Route::post('/datos-examen/{idexamen}', [RespuestaController::class, 'mail'])->name('usuario.mail');
	Route::post('/mis-examenes', [UsuarioController::class, 'misExamenesDatos'])->name('usuario.misExamenesDatos');
	Route::post('/update-usuario', [UsuarioController::class, 'updateUsuario'])->name('usuario.update');
});

