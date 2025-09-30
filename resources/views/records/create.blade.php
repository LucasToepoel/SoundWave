<!DOCTYPE html>`
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Example: Add a favicon -->
    <link rel="icon" href="/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Example: Add a CSS file -->
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow w-100" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Create Record</h3>
            <form action="/records" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="music_file" class="form-label">Music File</label>
                    <input type="file" class="form-control" id="music_file" name="music_file" accept=".mp3,.wav,.ogg" required>
                </div>
                <div class="mb-3">
                    <label for="album_id" class="form-label">Album</label>
                    <input type="number" class="form-control" id="album_id" name="album_id" required>
                </div>
                <div class="mb-3">
                    <label for="publisher_id" class="form-label">Publisher</label>
                    <input type="number" class="form-control" id="publisher_id" name="publisher_id" required>
                </div>
                <div class="mb-3">
                    <label for="track_number" class="form-label">Track Number</label>
                    <input type="number" class="form-control" id="track_number" name="track_number">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_explicit" name="is_explicit" value="1">
                    <label class="form-check-label" for="is_explicit">Explicit</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
