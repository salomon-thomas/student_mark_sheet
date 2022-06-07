<?php

use App\Http\Controllers\MarkSheetController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'namespace' => 'mark_sheet', 'prefix' => 'mark_sheet'], function () {
    Route::get('/', [MarkSheetController::class, 'index'])->name('mark_sheet.index');
    Route::get('/add', [MarkSheetController::class, 'create'])->name('mark_sheet.create');
    Route::post('/add', [MarkSheetController::class, 'store'])->name('mark_sheet.store');
    Route::get('/edit/{id}', [MarkSheetController::class, 'edit'])->name('mark_sheet.edit');
    Route::patch('/edit/{id}', [MarkSheetController::class, 'update'])->name('mark_sheet.update');
    Route::get('/delete/{id}', [MarkSheetController::class, 'delete'])->name('mark_sheet.delete');
});
