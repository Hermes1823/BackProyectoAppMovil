<!DOCTYPE html>
<html>
<head>
    <title>Viaje</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>{{ $tipoGasto->Descripcion }}</h1>

    <h2>Detalles de viaje</h2>

    @foreach ($tipoGasto->detalleviajes as $detalleViaje)
        <div>
            <p>{{ $detalleViaje->empleado->Nombre }}</p>
            <p>{{ $detalleViaje->empleado->Telefono }}</p>
            <p>{{ $detalleViaje->empleado->Cargo }}</p>
            <p>{{ $detalleViaje->FechaSalida }}</p>
            <p>{{ $detalleViaje->FechaRegreso }}</p>
        </div>
    @endforeach
</body>
</html>