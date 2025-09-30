<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Page</title>
</head>
<body>
<h1>Welcome to the Test Page</h1>
@foreach($records as $record)
    <div>
        <strong>ID:</strong> {{ $record->album->release_dae }}<br>

    </div>

@endforeach
<p>This is a basic HTML page.</p>
</body>
</html>
