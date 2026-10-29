<?php

use App\Http\Controllers\Admin\ContactInformationController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/practice', [PracticeController::class, 'index'])->name('practice.index');
Route::post('/practice/start', [PracticeController::class, 'start'])->name('practice.start');
Route::get('/practice/questions', [PracticeController::class, 'show'])->name('practice.show');
Route::post('/practice/finish', [PracticeController::class, 'finish'])->name('practice.finish');
Route::get('/practice/result', [PracticeController::class, 'result'])->name('practice.result');

Route::middleware(['auth', 'can:manage-questions'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::get('/', [QuestionController::class, 'index'])->name('dashboard');
        Route::get('/contact-information', [ContactInformationController::class, 'edit'])
            ->name('contact-information.edit');
        Route::put('/contact-information', [ContactInformationController::class, 'update'])
            ->name('contact-information.update');
        Route::resource('questions', QuestionController::class)->except(['show']);
    });
