<?php


use App\Http\Controllers\Auth\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

//Template Route ke Controller
// Route::get('<url>',[App\Http\Controllers\Nama_Controller::class,'nama_method']);

//Contoh
Route::get('/',[MahasiswaController::class,'index']);

Route::get('/mahasiswa',[MahasiswaController::class, 'show']);

Route::get('/dosen',[DosenController::class, 'index']);
