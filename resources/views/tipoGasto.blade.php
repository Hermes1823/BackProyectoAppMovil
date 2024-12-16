<!DOCTYPE html>
<html>
<head>
    <title>Tipo de gasto</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>{{ $tipoGasto->Descripcion }}</h1>

    <h2>Detalles de gasto</h2>

    @foreach ($tipoGasto->detallegastos as $detalleGasto)
        <div>
            <h3>{{ $detalleGasto->viaje->Destino }}</h3>
            <p>{{ $detalleGasto->empleado->Nombre }}</p>
            <p>{{ $detalleGasto->Monto }}</p>
            <p>{{ $detalleGasto->Fecha }}</p>
        </div>
    @endforeach
</body>
</html>