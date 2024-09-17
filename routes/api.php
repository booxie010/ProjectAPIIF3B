<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fakultas', [FakultasController::class, 'index']);
Route::get('/prodi', action: [ProdiController::class, 'index']);
Route::post('/fakultas', action: [FakultasController::class, 'store']);
Route::post('/prodi', action: [ProdiController::class, 'store']);
Route::patch('/fakultas/(fakultas)', action: [FakultasController::class, 'update']);
Route::patch('/fakultas/(fakultas)', action: [FakultasController::class, 'update']);
Route::delete('/fakultas/(fakultas)', action: [FakultasController::class, 'destroy']);


