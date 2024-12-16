<!DOCTYPE html>
<html>
<head>
    <title>Detalle de viaje</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Detalle de viaje</h1>
    <p>{{ $detalleViaje->FechaSalida }}</p>
    <p>{{ $detalleViaje->FechaRegreso }}</p>

    <h2>Viaje</h2>
    <p>{{ $detalleViaje->viaje->Destino }}</p>

    <h2>Empleado</h2>
    <p>{{ $detalleViaje->empleado->Nombre }}</p>
    <p>{{ $detalleViaje->empleado->Telefono }}</p>
    <p>{{ $detalleViaje->empleado->Cargo }}</p>

    <h2>Detalle de gastos</h2>
    @foreach ($detalleViaje->detallegastos as $detalleGasto)
        <div>
            <p>{{ $detalleGasto->Monto }}</p>
            <p>{{ $detalleGasto->Fecha }}</p>
        </div>
    @endforeach
</body>
</html>