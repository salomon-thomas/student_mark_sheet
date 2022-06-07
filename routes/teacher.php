<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'namespace' => 'teacher', 'prefix' => 'teacher'], function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/add', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/add', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::patch('/edit/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
});
