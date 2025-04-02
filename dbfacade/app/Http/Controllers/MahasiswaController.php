<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insertSql(){
        $query = DB::insert('insert into mahasiswas (nama, nim, prodi, jurusan, ipk, created_at, updated_at) values ("Andika FIransyah", "2311081004", "TRPL", "Teknologi Informasi", 3.94, now(), now())');
    }

    public function insertPrepared(){
        $query = DB::insert('insert into mahasiswas (nama, nim, prodi, jurusan, ipk, created_at, updated_at) values (?,?,?,?,?,?,?)',["Andika FIransyah", "2311081004", "TRPL", "Teknologi Informasi", 3.96, now(), now()]);
    }

    public function insertBinding(){
        $query = DB::insert('insert into mahasiswas (nama, nim, prodi, jurusan, ipk, created_at, updated_at) values (:nama, :nim, :prodi, :jurusan, :ipk, :created_at, :updated_at)', [
            'nama' => 'Andika Firansyah',
            'nim' => '2311081004',
            'prodi' => 'TRPL',
            'jurusan' => 'Tekinfo',
            'ipk' => 3.99,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function update(){
        $query = DB::update('update mahasiswas set nama = "Andikaaa" where nama = ?', ['Andika Firansyah']);
    }

    public function delete(){
        $query = DB::delete('delete from mahasiswas where nama = ?', ['Andikaaa']);
    }

    public function select(){
        $query = DB::select("Select * from mahasiswas");
        dd($query);
    }

    public function selectTampil(){
        $query = DB::select("SELECT * FROM mahasiswas");

        echo ($query[0]->nama) . "<br/>";
        echo ($query[0]->nim) . "<br/>";
        echo ($query[0]->prodi) . "<br/>";
        echo ($query[0]->jurusan) . "<br/>";
        echo ($query[0]->ipk);
    }

    public function selectView(){
        $query = DB::select("SELECT * from mahasiswas");

        return view('mahasiswa')->with(['mahasiswa'=>$query]);
    }

    public function selectWhere(){
        $query = DB::select("select * from mahasiswas where id = ?", [6]);

        return view('mahasiswa')->with(['mahasiswa'=>$query]);
    }

    //Faced untuk query selain CRUD
    public function statement(){
        $query = DB::statement("TRUNCATE mahasiswas");

        return('Table mahasiswa sudah kosong');
    }
}
