<?php

use Illuminate\Support\Facades\Route;

//-- Rutas de la aplicación
Route::get('/', [\App\http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/quienes-somos', [\App\http\Controllers\AboutController::class, 'about'])->name('about');

//-- Rutas de servicios (página pública)
Route::get('/servicios', [\App\Http\Controllers\ServicioController::class, 'services'])->name('services');

//-- Rutas de noticias
Route::get('/noticias/principales', [\App\http\Controllers\NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/agregar', [\App\http\Controllers\NoticiaController::class, 'create'])->name('noticias.create')->middleware('auth');
Route::post('/noticias/agregar', [\App\http\Controllers\NoticiaController::class, 'store'])->name('noticias.store')->middleware('auth');
Route::get('/noticias/{id}', [\App\http\Controllers\NoticiaController::class, 'show'])->name('noticias.show')->whereNumber('id');
Route::get('/noticias/{id}/editar', [\App\http\Controllers\NoticiaController::class, 'edit'])->name('noticias.edit')->whereNumber('id')->middleware('auth');
Route::put('/noticias/{id}/actualizar', [\App\http\Controllers\NoticiaController::class, 'update'])->name('noticias.update')->whereNumber('id')->middleware('auth');
Route::delete('/noticias/{id}/eliminar', [\App\http\Controllers\NoticiaController::class, 'destroy'])->name('noticias.destroy')->whereNumber('id')->middleware('auth');
Route::get('/noticias/{id}/eliminar', [\App\http\Controllers\NoticiaController::class, 'delete'])->name('noticias.delete')->whereNumber('id')->middleware('auth');

//-- Rutas de servicios (CRUD)
Route::get('/servicios/agregar', [\App\http\Controllers\ServicioController::class, 'create'])->name('servicios.create')->middleware('auth');
Route::post('/servicios/agregar', [\App\http\Controllers\ServicioController::class, 'store'])->name('servicios.store')->middleware('auth');
Route::get('/servicios/{id}', [\App\http\Controllers\ServicioController::class, 'show'])->name('servicios.show')->whereNumber('id');
Route::get('/servicios/{id}/editar', [\App\http\Controllers\ServicioController::class, 'edit'])->name('servicios.edit')->whereNumber('id')->middleware('auth');
Route::put('/servicios/{id}/actualizar', [\App\http\Controllers\ServicioController::class, 'update'])->name('servicios.update')->whereNumber('id')->middleware('auth');
Route::delete('/servicios/{id}/eliminar', [\App\http\Controllers\ServicioController::class, 'destroy'])->name('servicios.destroy')->whereNumber('id')->middleware('auth');
Route::get('/servicios/{id}/eliminar', [\App\http\Controllers\ServicioController::class, 'delete'])->name('servicios.delete')->whereNumber('id')->middleware('auth');
Route::post('/servicios/{id}/adquirir', [\App\Http\Controllers\ServicioController::class, 'adquirir'])->name('servicios.adquirir')->whereNumber('id')->middleware('auth');

//-- Rutas de autenticación
Route::get('/iniciar-sesion', [\App\http\Controllers\AuthController::class, 'login'])->name('auth.login');

Route::post('/iniciar-sesion', [\App\http\Controllers\AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/registro', [\App\http\Controllers\AuthController::class, 'register'])->name('auth.register');

Route::post('/registro', [\App\http\Controllers\AuthController::class, 'store'])->name('auth.register');

Route::post('/cerrar-sesion', [\App\http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

//-- Rutas de usuarios (solo autenticados)
Route::get('/usuarios', [\App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('usuarios.lista');

//-- Rutas de perfil
Route::get('/perfil', [\App\Http\Controllers\ProfileController::class, 'show'])->middleware('auth')->name('perfil.show');
Route::get('/perfil/editar', [\App\Http\Controllers\ProfileController::class, 'edit'])->middleware('auth')->name('perfil.edit');
Route::put('/perfil/actualizar', [\App\Http\Controllers\ProfileController::class, 'update'])->middleware('auth')->name('perfil.update');

//-- Rutas de mis servicios (suscripciones)
Route::get('/mis-servicios', [\App\Http\Controllers\SuscripcionController::class, 'index'])->middleware('auth')->name('suscripciones.index');
Route::put('/mis-servicios/{id}/cancelar', [\App\Http\Controllers\SuscripcionController::class, 'cancel'])->middleware('auth')->name('suscripciones.cancel')->whereNumber('id');

// Rutas de pagos con MercadoPago
Route::middleware('auth')->group(function () {
    Route::get('/pago/servicio/{id}', [\App\Http\Controllers\PagoController::class, 'crearPreferencia'])
        ->name('pago.crear')->whereNumber('id');
    Route::get('/pago/success', [\App\Http\Controllers\PagoController::class, 'success'])->name('pago.success');
    Route::get('/pago/failure', [\App\Http\Controllers\PagoController::class, 'failure'])->name('pago.failure');
    Route::get('/pago/pending', [\App\Http\Controllers\PagoController::class, 'pending'])->name('pago.pending');
    Route::post('/pago/simular/{id}', [\App\Http\Controllers\PagoController::class, 'simularPago'])
        ->name('pago.simular')->whereNumber('id');
});

// Webhook (sin autenticación)
Route::post('/webhook/mercadopago', [\App\Http\Controllers\PagoController::class, 'webhook'])->name('pago.webhook');
