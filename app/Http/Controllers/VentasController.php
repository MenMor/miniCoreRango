<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Equipo;

class VentasController extends Controller
{
    
    public function filtrarVentas(Request $request)
    {
        $equipos = Equipo::all();
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $nombreEquipo = $request->input('nombre_equipo');

        $ventas = Venta::whereHas('equipo', function ($query) use ($nombreEquipo) {
            $query->where('nombreEquipo', $nombreEquipo);
        })
        ->whereBetween('fechaventa', [$fechaInicio, $fechaFin])
        ->get();

        $montoTotal = Venta::whereHas('equipo', function ($query) use ($nombreEquipo) {
            $query->where('nombreEquipo', $nombreEquipo);
        })
        ->whereBetween('fechaventa', [$fechaInicio, $fechaFin])
        ->sum('monto');

        return view('calcular', compact('ventas', 'montoTotal', 'equipos'));
    }
}
