<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/export', function () {
    return view('export');
})->middleware(['auth', 'verified'])->name('export');
Route::get('/student', [StudentController::class, 'student'])->middleware(['auth', 'verified'])->name('student');
Route::get('/prof', [StudentController::class, 'prof'])->middleware(['auth', 'verified'])->name('prof');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/add', [StudentController::class, 'addstudent'])->name('addStudent');







Route::get('/quizes', [ExamController::class, 'Quizes'])->name('quizes');
Route::get('/delete/{id}', [ExamController::class, 'deleteQuiz'])->name('deleteQuiz');
Route::post('/addQuiz', [ExamController::class, 'addQuiz'])->name('addQuiz');
Route::post('/saveEdit', [ExamController::class, 'saveEditQuiz'])->name('saveEdit');
Route::get('/json', [ExamController::class, 'quizJson'])->name('quizJson');




Route::get('/midterm', [ExamController::class, 'term'])->name('midterm');
Route::get('/finals', [ExamController::class, 'finals'])->name('finals');




require __DIR__.'/auth.php';
