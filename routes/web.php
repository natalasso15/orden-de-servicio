<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ordenes', [OrdenDeServicioController::class, 'index'])
    ->name('ordenes.index');

Route::get('/ordenes/crear', [OrdenDeServicioController::class, 'create'])
    ->name('ordenes.create');

Route::post('/ordenes', [OrdenDeServicioController::class, 'store'])
    ->name('ordenes.store');

Route::get('/ordenes/{id}/editar', [OrdenDeServicioController::class, 'edit'])
    ->name('ordenes.edit');

Route::put('/ordenes/{id}', [OrdenDeServicioController::class, 'update'])
    ->name('ordenes.update');