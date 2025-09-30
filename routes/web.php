<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/mediaplayer', [App\Http\Controllers\MediaPlayerController::class, 'index'])->name('mediaplayer');

Route::get('/records/index',[RecordController::class, 'index'])->name('records.index');
Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');
Route::post('/records', [RecordController::class, 'store'])->name('records.store');
Route::get('/records/{record}', [RecordController::class, 'show'])->name('records.show');
// Other CRUD routes (show, edit, update, destroy) can be added similarly.





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

