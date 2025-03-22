<?php

use Illuminate\Support\Facades\Route;

//Template Routing
// Route::<jenis method>(<alamat URL>,<proses yang dijalankan>)

//Routing Default
Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile',function(){
    echo '<h1>Profile</h1>';
    return '<p>Jurusan Teknologi Informasi</p>';
});

//Menangkap paramater di URL dengan variable nama
Route::get('/mahasiswa/{nama}',function($nama){
    return '<h1>Nama : '.$nama.'</h1>';
});

//OPTIONAL PARAMATER
//Menangkap paramater di URL dengan variable nama
//Jika variable nama tidak diisi maka akan menampilkan default
//Syaratnya adalah pada parameter harus diberikan tanda tanya (?) dan diisikan nilai default pada paramater anonymous function
Route::get('/mahasiswa/{nama?}',function($nama = 'Mahasiswa'){
    return '<h1>Nama : '.$nama.'</h1>';
});

//PARAMETER REGULAR EXPRESSION
Route::get('/mahasiswa/{nama?}/{nim?}',function($nama = 'Mahasiswa', $nim = 1){
    return '<h1>Mahasiswa dengan nama '.$nama.' memiliki nim '. $nim .'</h1>';
})->where('nim','[0-9]+');

//Redirect Route
//Artinya jika diisikan url /siswa maka akan diarahkan ke /mahasiswa
Route::redirect('/siswa','/mahasiswa');

//Route Group
//Membuat group route dengan prefix yang sama seperti /mahasiswa
//sehingga jika kita ingin mengubah /mahasiswa tidak perlu mengubah satu persatu route yang ada
Route::prefix('mahasiswa')->group(function(){
    Route::get('/{nama?}/{nim?}',function($nama = 'Mahasiswa', $nim = 1){
        return '<h1>Mahasiswa dengan nama '.$nama.' memiliki nim '. $nim .'</h1>';
    })->where('nim','[0-9]+');
});

//Route FallBack
//Guna dari route ini adalah untuk handling jika route yang diakses tidak ditemukan atau tidak ada
//Maka akan menampilkan pesan 'Maaf, halaman tidak ditemukan 
Route::fallback(function(){
    return '<h1>Maaf, halaman tidak ditemukan</h1>';
});
