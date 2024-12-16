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
    <h1>{{ $trip->destination }}</h1>
    <p><strong>Fecha de inicio:</strong> {{ $trip->start_date }}</p>
    <p><strong>Fecha de finalización:</strong> {{ $trip->end_date }}</p>
    <p><strong>Descripción:</strong> {{ $trip->description }}</p>
    <h2>Reportes</h2>
    @foreach ($trip->reports as $report)
        <div>
            <h3>{{ $report->title }}</h3>
            <p>{{ $report->content }}</p>
        </div>
    @endforeach
</body>
</html>