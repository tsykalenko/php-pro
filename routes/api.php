<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/api/book.store', [BookController::class, 'store']);
Route::get('/api/book.show/{id}', [BookController::class, 'show']);
Route::put('/api/book.put/{id}', [BookController::class, 'update']);
Route::delete('/api/book.delete/{id}', [BookController::class, 'destroy']);
