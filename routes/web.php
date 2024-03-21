<?php

use App\Http\Controllers\API\SupirController;
use App\Http\Controllers\API\NotaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('supir.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/supir', [SupirController::class, 'index'])->name('supir.index');
    Route::get('/supir/create', [SupirController::class, 'create'])->name('supir.create');
    Route::post('/supir', [SupirController::class,'store'])->name('supir.store');
    Route::get('/nota', [NotaController::class, 'showNota'])->name('supir.nota');
    Route::get('/supir/{id}/edit', [SupirController::class, 'edit'])->name('supir.edit');
    Route::put('/supir/{id}', [SupirController::class, 'update'])->name('supir.update');
    Route::delete('/supir/{id}', [SupirController::class, 'destroy'])->name('supir.destroy');
    route::get('/upload-nota', [NotaController::class, 'uploadNota'])->name('upload.nota');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/{any}', function () {
    return view('404');
})->where('any', '.*');
