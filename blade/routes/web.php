<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa',function(){
    $nama = 'Andika Firansyah';
    $nim = '2311081004';
    $kelas = 'TRPL2B';

    return view('akademik.mahasiswa')->with(compact('nama','nim','kelas'));
});

Route::get('/dosen',function(){
    $nama = 'Aldo Erianda';
    $nip = '2311081005';
    $prodi = 'Manajemen Informatika';

    return view('akademik.dosen')->with(compact('nama','nip','prodi'));
});

//Named Route
//Penggunaan named route memungkinkan kita untuk memberikan nama pada route yang kita buat.
//Dengan memberikan nama pada route, kita bisa memanggil route tersebut dengan menggunakan nama yang telah kita tentukan.
//sehingga jika terjadi perubahan pada route, kita tidak perlu mengubah seluruh kode yang memanggil route tersebut.
Route::get('/pnp/ti/prodi',function(){
    $nama = 'Manajemen Informatika';
    $jurusan = 'Teknologi Informasi';

    return view('akademik.prodi')->with(compact('nama','jurusan'));
})->name('prodi');
