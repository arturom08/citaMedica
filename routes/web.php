<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Especialidades
Route::get('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'index']);

Route::get('/especialidades/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'sendData']);

Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);
Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);

//Rutas Médicos
Route::resource('medicos', 'App\Http\Controllers\DoctorController');

//Rutas Pacientes
Route::resource('pacientes', 'App\Http\Controllers\PatientController');