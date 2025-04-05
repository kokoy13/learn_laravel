<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //

    public function cekObjek()
    {
        $mahasiswa = new Mahasiswa();
        dd($mahasiswa);
    }

    public function insert()
    {
        // TODO: Implementasi metode insert
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '23232323';
        $mahasiswa->nama_lengkap = 'andika Firansyah';
        $mahasiswa->tempat_lahir = 'Pekanbaru';
        $mahasiswa->tgl_lahir = '2004-08-09';
        $mahasiswa->email = 'andikafiransyah1905@gmail.com';
        $mahasiswa->prodi = 'TRPL';
        $mahasiswa->alamat = 'Jln Nuansa Indah II';
        $mahasiswa->save();
    }

    public function massAssignment()
    {
        $mahasiswa = Mahasiswa::create(
            [
                'nim' => '2311081004',
                'nama_lengkap' => 'Kaka',
                'tempat_lahir' => 'Solok',
                'tgl_lahir' => '2004-09-09',
                'email' => 'kazekage@gmail.com',
                'prodi' => 'TRPL',
                'alamat' => 'Padang'
            ]
            );

            $mahasiswa1 = Mahasiswa::create(
                [
                    'nim' => '2311081006',
                    'nama_lengkap' => 'Kakaz',
                    'tempat_lahir' => 'Solok',
                    'tgl_lahir' => '2004-09-09',
                    'email' => 'kazekagekazz@gmail.com',
                    'prodi' => 'TRPL',
                    'alamat' => 'Padang'
                ]
                );
    }

    public function update()
    {
        $mahasiswa = Mahasiswa::find(1);

        $mahasiswa->tempat_lahir = 'California';
        $mahasiswa->prodi = 'Tekom';
        $mahasiswa->save();
    }

    public function updateWhere()
    {
        $mahasiswa = Mahasiswa::where('nim','2311081006')->first();
        $mahasiswa->alamat = 'Koto Lalang';
        $mahasiswa->save();
    }

    public function massUpdate()
    {
        // TODO: Implementasi metode massUpdate
        $mahasiswa = Mahasiswa::where('nim','2311081006')->first()->update(
            [
                'tempat_lahir'=>'Jakarta',
                'prodi'=>'MI'
            ]
            );
    }

    public function delete()
    {
        // TODO: Implementasi metode delete
        $mahasiswa = Mahasiswa::find(6);
        $mahasiswa->delete();
    }

    public function destroy()
    {
        // TODO: Implementasi metode destroy
        $mahasiswa = Mahasiswa::destroy(7);
        //atau $mahasiswa = Mahasiswa::destroy([4, 3, 2, 1]). jika jumlah data yang ingin dihapus lebih dari satu
    }

    public function massDelete()
    {
        // TODO: Implementasi metode massDelete
        $mahasiswa = Mahasiswa::where('prodi', 'TRPL')->delete();
    }

    public function all()
    {
        // TODO: Implementasi metode all
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function allView()
    {
        // TODO: Implementasi metode allView
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function getWhere()
    {
        // TODO: Implementasi metode getWhere
        $mahasiswa = Mahasiswa::where('prodi','Tekom')
            ->orderBy('id','asc')
            ->get();
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function testWhere()
    {
        // TODO: Implementasi metode testWhere

    }

    public function first()
    {
        // TODO: Implementasi metode first
        $mahasiswa = Mahasiswa::where('prodi', 'TRPL')->first();
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function find()
    {
        // TODO: Implementasi metode find
        $mahasiswa = Mahasiswa::find(2);
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function latest()
    {
        // TODO: Implementasi metode latest
        $mahasiswa = Mahasiswa::latest()->get();
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function limit()
    {
        // TODO: Implementasi metode limit
        $mahasiswa = Mahasiswa::latest()->limit(2)->get();
        return view('mahasiswa')->with(['mahasiswa'=>$mahasiswa]);
    }

    public function skipTake()
    {
        // TODO: Implementasi metode skipTake
        $mahasiswa = Mahasiswa::orderBy('id')->skip(1)->take(2)->get();
        return view('mahasiswa')->with(['mahasiswa'=>$mahasiswa]);
    }

    public function softDelete()
    {
        // TODO: Implementasi metode softDelete

    }

    //Memunculkan data meskipun yang sudah disoft delete
    public function withTrashed()
    {
        $mahasiswa = Mahasiswa::withTrashed()->get();
        return view('mahasiswa')->with(['mahasiswas'=>$mahasiswa]);
    }

    public function restore()
    {
        // TODO: Implementasi metode restore
        Mahasiswa::withTrashed()->where('id','3')->restore();
        return 'Berhasil Restore Data';
    }

    public function forceDelete()
    {
        // TODO: Implementasi metode forceDelete
        Mahasiswa::where('id','3')->forceDelete();
        return 'Data Berhasil dihapus secara permanen';
    }
}
