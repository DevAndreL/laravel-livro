<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/livro', [LivroController::class, 'index']);
    Route::post('/livro', [LivroController::class, 'store']);
    Route::get('/livro/{id}', [LivroController::class, 'show']);
    Route::put('/livro/{id}', [LivroController::class, 'update']);
    Route::delete('/livro/{id}', [LivroController::class, 'destroy']);
});


Route::post('/user', [UserController::class, 'user']);
Route::post('/login', [UserController::class, 'login']);
