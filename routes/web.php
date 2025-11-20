<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Dashboard with stats
Route::get('/dashboard', function () {
    $stats = [
        'total' => Task::count(),
        'completed' => Task::where('is_done', true)->count(),
        'pending' => Task::where('is_done', false)->count(),
    ];
    $tasks = Task::latest()->take(8)->get();
    return view('dashboard', compact('stats','tasks'));
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
    Route::resource('tasks', TaskController::class);
});

// Breeze / auth routes (includes login, register, password, logout)
require __DIR__.'/auth.php';



