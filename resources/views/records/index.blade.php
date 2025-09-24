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

        <strong>Album:</strong> {{ $record->album->title }}<br>

        <strong>Publisher:</strong> {{ $record->publisher->name }}<br>

        <strong>Artists:</strong>
        @foreach($record->artists as $artist)
            {{ $artist->name }} ({{ $artist->pivot->role }})@if(!$loop->last), @endif
        @endforeach
        <br>
    </div>
    <hr>
@endforeach
<p>This is a basic HTML page.</p>
</body>
</html>
