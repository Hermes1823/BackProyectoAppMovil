<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>{{ $report->title }}</h1>
    <p>{{ $report->content }}</p>
    <h2>Viaje</h2>
    <p>{{ $report->trip->destination }}</p>
    <p>{{ $report->trip->description }}</p>
    <h2>Obra</h2>
    <p>{{ $report->work->name }}</p>
    <p>{{ $report->work->location }}</p>
</body>
</html>