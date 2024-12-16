<!DOCTYPE html>
<html>
<head>
    <title>Obra</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>{{ $work->name }}</h1>
    <p><strong>Locación:</strong> {{ $work->location }}</p>
    <p><strong>Fecha de inicio:</strong> {{ $work->start_date }}</p>
    <p><strong>Fecha de finalización:</strong> {{ $work->end_date }}</p>
    <h2>Reportes</h2>
    @foreach ($work->reports as $report)
        <div>
            <h3>{{ $report->title }}</h3>
            <p>{{ $report->content }}</p>
        </div>
    @endforeach
</body>
</html>