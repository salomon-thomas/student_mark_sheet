<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'namespace' => 'student', 'prefix' => 'student'],function () {
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
        Route::get('/add', [StudentController::class, 'create'])->name('student.create');
        Route::post('/add', [StudentController::class, 'store'])->name('student.store');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::patch('/edit/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
});