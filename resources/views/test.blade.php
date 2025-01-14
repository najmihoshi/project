<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Button</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Ensure Tailwind CSS is loaded -->
</head>
<body>
    <a href="{{ route('reports.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Lodge a Report</a>
</body>
</html>