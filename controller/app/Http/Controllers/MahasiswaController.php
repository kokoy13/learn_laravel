<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        return view('welcome',['mahasiswas'=>'Welcome Mahasiswas']);
    }

    public function show(){
        $nama = 'Andika';
        $nim = 23110181004;
        $jurusan = 'Teknologi Informasi';
        $prodi = 'TRPL';

        return view('Mahasiswa')->with(compact('nama','nim','jurusan','prodi'));
    }
}
