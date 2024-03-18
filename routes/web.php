<?php

use App\Http\Controllers\API\SupirController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('supir.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/supir', [SupirController::class, 'index'])->name('supir.index');
    Route::get('/supir/create', [SupirController::class, 'create'])->name('supir.create');
    Route::post('/supir', [SupirController::class, 'store'])->name('supir.store');
    Route::get('/supir/register', [SupirController::class, 'showRegistrationForm'])->name('supir.register');
    Route::post('/supir/register', [SupirController::class, 'register']);
    Route::get('/supir/{id}/edit', [SupirController::class, 'edit'])->name('supir.edit');
    Route::put('/supir/{id}', [SupirController::class, 'update'])->name('supir.update');
    Route::delete('/supir/{id}', [SupirController::class, 'destroy'])->name('supir.destroy');
});

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/{any}', function () {
    return view('404');
})->where('any', '.*');
