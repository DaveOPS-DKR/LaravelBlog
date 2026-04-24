<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('articles.index');
    })->name('dashboard');

    Route::resource('articles', ArticleController::class);
    Route::resource('types', TypeController::class);
});

require __DIR__.'/auth.php';
