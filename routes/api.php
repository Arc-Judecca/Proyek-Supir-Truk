<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SupirController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rute untuk mendapatkan data user login
Route::get('/user', [SupirController::class, 'getUser']);

// Rute untuk mendapatkan data nota PDF
Route::get('/supir/{id}/nota', [SupirController::class, 'getNota']);
