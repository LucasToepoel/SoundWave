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
            <strong>ID:</strong> {{ $record->id }}<br>
            <strong>Title:</strong> {{ $record->title }}<br>
            <strong>Description:</strong> {{ $record->artist }}<br>
           
        </div>
        <hr>
    @endforeach
    <p>This is a basic HTML page.</p>
</body>
</html>