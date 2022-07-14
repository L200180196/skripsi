<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AdminKelas extends Controller
{
    public function index()
    {
        return view('dashboard.kelas.index',[
            'kelas' => Kelas::get(),
        ]);
    }

    public function select(Request $request)
    {
        return view('dashboard.kelas.select',[
            'data_siswa' => DataDiri::where('kelas','=', $request->kelas)->get(),
            'kelas' => $request->kelas,
        ]);
    }
}