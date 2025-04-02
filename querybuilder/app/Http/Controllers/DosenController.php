<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function insertDosen(){
        $query = DB::table('dosens')->insert([
            'nik' => '1371060908040003',
            'nama' => 'Andika Firansyah',
            'email' => 'andikafiransyah19@gmail.com',
            'no_telp' => '082169806800',
            'prodi' => 'TRPL',
            'alamat' => 'Jln Batang Anai no 9 Rimbo Kaluang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function insertBanyakDosen(){
        $query = DB::table('dosens')->insert([
            [
                'nik' => '1371060908040001',
                'nama' => 'Andika Firansyah',
                'email' => 'andikafiransyah190@gmail.com',
                'no_telp' => '082169806800',
                'prodi' => 'TRPL',
                'alamat' => 'Jln Batang Anai no 9 Rimbo Kaluang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'nik' => '1371060908040002',
                'nama' => 'Andika Firansyah',
                'email' => 'limacastle@gmail.com',
                'no_telp' => '082169806800',
                'prodi' => 'TRPL',
                'alamat' => 'Jln Batang Anai no 9 Rimbo Kaluang',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    public function updateDosen(){

        $query = DB::table('dosens')
            ->where('nama', 'Andika Firansyah')
            ->update(
                [
                    'no_telp' => '082121212121',
                    'prodi' => 'MI',
                    'updated_at' => now(),
                ]
                );
            dd($query);
    }


    //<br> digunakan untuk simbol selain, jadi where prodi selain TRPL
    public function updateWhereDosen(){

        $query = DB::table('dosens')
            ->where('nama', 'Andika Firansyah')
            ->where('prodi', '<>', 'TRPL')
            ->update(
                [
                    'no_telp' => '082121212121',
                    'prodi' => 'TRPL',
                    'updated_at' => now(),
                ]
                );
            dd($query);
    }

    public function updateOrInsert(){
        $query = DB::table('dosens')->updateOrInsert(
            [
                'nik' => '1371060908040003'
            ],
            [
                'nama' => 'Azzam Alfarizki',
                'email' => 'azzamalfarizki@gmail.com',
                'no_telp' => '080808080808',
                'prodi' => 'Elektronika',
                'alamat' => 'Jln Juanda no 2 Padang',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
        dd($query);
    }

    public function deleteDosen(){
        $query = DB::table('dosens')
            ->where('nik','1371060908040003')
            ->delete();
        dd($query);
    }

    public function get(){
        $query = DB::table('dosens')->get();

        dd($query);
    }

    public function getTampil(){
        $query = DB::table('dosens')->get();

        echo $query[0]->id . "<br/>";
        echo $query[0]->nik . "<br/>";
        echo $query[0]->nama . "<br/>";
        echo $query[0]->email . "<br/>";
        echo $query[0]->alamat . "<br/>";
    }

    public function getView(){
        $query = DB::table('dosens')->get();

        return view('Dosen')->with(['dosens'=>$query]);
    }

    public function getWhere(){
        $query = DB::table('dosens')
        ->where('prodi','MI')
        ->orderBy('nama','desc')
        ->get();

        if($query->isNotEmpty()){
            return view('Dosen')->with(['dosens'=>$query]);
        }else{
            return "<script>
                    alert('Data Dosen tidak tersedia');
                </script>
            ";
        }
    }

    //membatasi kolom apa saja yg ingin di get
    public function selectDosen(){
        $query = DB::table('dosens')
        ->select('nik','nama as nama_dosen')
        ->get();

        dd($query);
        //return view('Dosen')->with(['dosens'=>$query]);
    }


    //skip(2) artinya tidak akan membaca 2 record pertama dari table dosens
    public function take(){
        $query = DB::table('dosens')
            ->orderBy('nama', 'asc')
            ->skip(2)
            ->take(3)
            ->get();

            return view('Dosen')->with(['dosens'=>$query]);
    }

    public function first(){
        $query = DB::table('dosens')
            ->where('nama','Andika Firansyah')->first();
            // dd($query);
            return view('Dosen')->with(['dosens'=>$query]);
    }

    public function find(){
        $query = DB::table('dosens')->find(1);

        return view('Dosen')->with(['dosens'=>$query]);
    }

    public function raw(){
        $query = DB::table('dosens')
            ->selectRaw('count(*) as total_dosen')
            ->get();

            echo $query[0]->total_dosen;
    }
}
