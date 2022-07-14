<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\KeterampilanNilai;
use App\Models\MapelDiampu;
use Illuminate\Http\Request;

class KeterampilanAgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->all() == null) {
            $mapel_diampu = MapelDiampu::where('nip_guru', auth()->user()->nomor_induk)
                                        ->where('mapel', session()->get('mapel'))
                                        ->first();
            return view('dashboard.data_nilai.keterampilan.index', [
                'nilai_keterampilan' => KeterampilanNilai::where('mapel', '=', $mapel_diampu->mapel)->get(),
                'mapel' => session()->get('mapel'),
                'kelas' => session()->get('kelas'),
            ]);
        } else {
            $mapel_diampu = MapelDiampu::where('nip_guru', auth()->user()->nomor_induk)
                                        ->where('mapel', $request->mapel)
                                        ->first();
            return view('dashboard.data_nilai.keterampilan.index', [
                'nilai_keterampilan' => KeterampilanNilai::where('mapel', '=', $mapel_diampu->mapel)->get(),
                'mapel' => $mapel_diampu->mapel,
                'kelas' => $mapel_diampu->kelas,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = KeterampilanNilai::rightJoin('data_diris', 'data_diris.nis', '=', 'keterampilan_nilais.nis')
                                    ->where('keterampilan_nilais.mapel', $request->mapel)
                                    ->orderBy('nama_lengkap')
                                    ->get();
        $user_nilai = DataDiri::where('kelas', $request->kelas)->orderBy('nama_lengkap')->get();
        return view('dashboard.data_nilai.keterampilan.create',[
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'data_user_nilai' => $user_nilai,
            'data_user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}