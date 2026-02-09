<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenTrabajoController;


Route::get('/', function () {
    return view('home');
});

Route::get('/form', [HomeController::class, 'form']);
Route::post('/guardar', [HomeController::class, 'guardar']);

//Rutas para Ordenes de Trabajo
Route::get('/ot', [OrdenTrabajoController::class, 'index']);
Route::get('/ot/crear', [OrdenTrabajoController::class, 'create']);
Route::post('/ot', [OrdenTrabajoController::class, 'store']);
Route::get('/ot/{id}/editar', [OrdenTrabajoController::class, 'edit']);
Route::put('/ot/{id}', [OrdenTrabajoController::class, 'update']);
Route::delete('/ot/{id}', [OrdenTrabajoController::class, 'destroy']);
