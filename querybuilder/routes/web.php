<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert-dosen', [DosenController::class, 'insertDosen']);
Route::get('/insert-banyak-dosen', [DosenController::class, 'insertBanyakDosen']);
Route::get('/update-dosen', [DosenController::class, 'updateDosen']);
Route::get('/update-where-dosen', [DosenController::class, 'updateWhereDosen']);
Route::get('/update-or-insert', [DosenController::class, 'updateOrInsert']);
Route::get('/delete-dosen', [DosenController::class, 'deleteDosen']);
Route::get('/get', [DosenController::class, 'get']);
Route::get('/get-tampil', [DosenController::class, 'getTampil']);
Route::get('/get-view', [DosenController::class, 'getView']);
Route::get('/get-where', [DosenController::class, 'getWhere']);
Route::get('/select-dosen', [DosenController::class, 'selectDosen']);
Route::get('/take', [DosenController::class, 'take']);
Route::get('/first', [DosenController::class, 'first']);
Route::get('/find', [DosenController::class, 'find']);
Route::get('/raw', [DosenController::class, 'raw']);




