<?php

namespace App\Http\Controllers;

use App\Models\KeterampilanNilai;
use App\Models\MataPelajaran;
use App\Models\PengetahuanNilai;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function indexPengetahuan()
    {
        return view('dashboard.data_nilai.pengetahuan.mapel',[
            'data_mapel' => MataPelajaran::get(),
        ]);
    }

    public function selectPengetahuan(Request $request)
    {
        $pilih = $request->mapel;
        if ($pilih == 'Pendidikan Agama dan Budi Pekerti') {
            return redirect('/dashboard/nilai/pengetahuan/agama')->with($request->session()->put('mapel', 'Agama'));
        } elseif ($pilih == 'Matematika') {
            return redirect('/dashboard/nilai/pengetahuan/matematika')->with($request->session()->put('mapel', 'Matematika'));
        } elseif ($pilih == 3) {
            return redirect('/dashboard/nilai/pengetahuan');
        } elseif ($pilih == 4) {
            return redirect('/dashboard/nilai/keterampilan');
        }
    }

    public function indexKeterampilan()
    {
        return view('dashboard.data_nilai.keterampilan.mapel',[
            'data_mapel' => MataPelajaran::get(),
        ]);
    }

    public function selectKeterampilan(Request $request)
    {
        $pilih = $request->mapel;
        if ($pilih == 'Seni Budaya dan Prakarya') {
            return redirect('/dashboard/nilai/keterampilan/senibudaya')->with($request->session()->put('mapel', 'Seni Budaya Dan Prakarya'));
        } elseif ($pilih == 'Agama') {
            return redirect('/dashboard/nilai/keterampilan/agama')->with($request->session()->put('mapel', 'Agama'));
        } elseif ($pilih == 'Matematika') {
            return redirect('/dashboard/nilai/keterampilan/matematika')->with($request->session()->put('mapel', 'Matematika'));
        } elseif ($pilih == 4) {
            return redirect('/dashboard/nilai/keterampilan');
        }
    }
}