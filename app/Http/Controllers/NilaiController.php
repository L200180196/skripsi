<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\KeterampilanNilai;
use App\Models\PengetahuanNilai;
use App\Models\SosialNilai;
use App\Models\SpiritualNilai;
use App\Models\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $data_mapel_guru = DataGuru::where('nip', '=', auth()->user()->nomor_induk)->first();
        $arr_kalimat = explode (", ",$data_mapel_guru->mata_pelajaran_diampu);
        return view('dashboard.data_nilai.index',[
            'data_mapel' => $arr_kalimat,
        ]);
    }

    public function select(Request $request)
    {
        $pilih = $request->data;
        if ($pilih == 1) {
            return redirect('/dashboard/nilai/spiritual');
        } elseif ($pilih == 2) {
            return redirect('/dashboard/nilai/sosial');
        } elseif ($pilih == 3) {
            return redirect('/dashboard/nilai/pengetahuan');
        } elseif ($pilih == 4) {
            return redirect('/dashboard/nilai/keterampilan');
        }
    }
}