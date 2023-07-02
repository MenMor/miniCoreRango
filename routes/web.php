<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;


Route::get('/filtrar-ventas', [VentasController::class, 'filtrarVentas'])->name('filtrar-ventas');





