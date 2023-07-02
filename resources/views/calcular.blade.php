<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<h1>Ventas dentro del rango de fechas</h1>

<form action="{{ route('filtrar-ventas') }}" method="GET">
    @csrf

    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" required>

    <label for="fecha_fin">Fecha de fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" required>

    <label for="nombre_equipo">Nombre del equipo:</label>
    <select id="nombre_equipo" name="nombre_equipo" required>
        @foreach($equipos as $equipo)
            <option value="{{ $equipo->nombreEquipo }}">{{ $equipo->nombreEquipo }}</option>
        @endforeach
    </select>

    <button type="submit">Filtrar</button>
</form>


@if($ventas->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Fecha de Venta</th>
                <th>Producto</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->fechaventa }}</td>
                    <td>{{ $venta->producto }}</td>
                    <td>{{ $venta->monto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="no-ventas">No se encontraron ventas dentro del rango de fechas seleccionado.</p>
@endif


<p class="monto-total">Monto total: {{ $montoTotal }}</p>
