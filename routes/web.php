<?php

use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return redirect()->route('pacientes.index');
});

Route::resource('pacientes', PacienteController::class);

Route::post('/buscar-cep', [CepController::class, 'buscarCep'])->name('buscar.cep');
