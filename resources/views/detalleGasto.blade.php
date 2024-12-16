<!DOCTYPE html>
<html>
<head>
    <title>Detalle de gasto</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Detalle de gasto</h1>
    <p>{{ $detalleGasto->Monto }}</p>
    <p>{{ $detalleGasto->Fecha }}</p>

    <h2>Tipo de gasto</h2>
    <p>{{ $detalleGasto->tipogasto->Descripcion }}</p>

    <h2>Viaje</h2>
    <p>{{ $detalleGasto->trip->destination }}</p>
    <p>{{ $detalleGasto->trip->start_date }}</p>
    <p>{{ $detalleGasto->trip->end_date }}</p>

    <h2>Empleado</h2>
    <p>{{ $detalleGasto->empleado->Nombre }}</p>
    <p>{{ $detalleGasto->empleado->Telefono }}</p>
    <p>{{ $detalleGasto->empleado->Cargo }}</p>
</body>
</html>