<?php

namespace App\Http\Controllers\Auth;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        $arrDosen = [
            'Roanl Hadi',
            'Deni S',
            'Fazrol R',
            'Deddy P',
            'Ervan A',
            'Cipto P'
        ];

        return view('Dosen',['dosen'=>$arrDosen]);
    }

    public function show(){

    }
}
