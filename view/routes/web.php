<?php

use Illuminate\Support\Facades\Route;

//Welcome merupakan default view yang akan ditampilkan ketika aplikasi diakses
Route::get('/', function () {
    return view('welcome');
});

//Mengirim data ke view
//varaible nama akan dikirim ke view mahasiswa
//nama variabel yang dikirim adalah nama dan nilainya adalah Rizki
// Route::get('/mahasiswa',function(){
//     return view('akademik.mahasiswa', ['nama' => 'Rizki']);
// });

//Mengirim banyak data ke view
// Route::get('/mahasiswa',function(){
//     return view('akademik.mahasiswa', [
//         'mhs1' => 'Rizki',
//         'mhs2' => 'Kaka',
//         'mhs3' => 'Eka',
//         'mhs4' => 'Putri',
//         'mhs5' => 'Nisa'
//     ]);
// });

//Mengirim banyak data ke view yang dimasukan ke dalam array
// Route::get('/mahasiswa',function(){
//     $mahasiswa = [
//         'mhs1' => 'Rizki',
//         'mhs2' => 'Kaka',
//         'mhs3' => 'Eka',
//         'mhs4' => 'Putri',
//         'mhs5' => 'Nisa'
//     ];
//     return view('akademik.mahasiswa',['mahasiswa' => $mahasiswa]);
// });

//Mengirim data ke view menggunakan with
Route::get('/mahasiswa',function(){
    $mahasiswa = [
        'mhs1' => 'Rizki',
        'mhs2' => 'Kaka',
        'mhs3' => 'Eka',
        'mhs4' => 'Putri',
        'mhs5' => 'Nisa'
    ];
    return view('akademik.mahasiswa')->with(compact('mahasiswa'));
}); 