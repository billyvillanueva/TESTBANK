<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/test', function () {
    return view('test');
})->middleware(['auth', 'verified'])->name('test');
Route::get('/export', function () {
    return view('export');
})->middleware(['auth', 'verified'])->name('export');
Route::get('/student', [StudentController::class, 'student'])->middleware(['auth', 'verified'])->name('student');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/add', [StudentController::class, 'addstudent'])->name('addStudent');





require __DIR__.'/auth.php';
