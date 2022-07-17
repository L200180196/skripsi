<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\KeterampilanNilai;
use App\Models\MapelDiampu;
use Illuminate\Http\Request;

class KeterampilanController extends Controller
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
        $validatedData = $request->validate([
            'nis' => 'required',
            'kelas' => 'required',
            'kd1_1' => 'nullable',
            'kd1_2' => 'nullable',
            'kd1_3' => 'nullable',
            'kd1_4' => 'nullable',
            'kd1_5' => 'nullable',
            'kd1_6' => 'nullable',
            'kd1_7' => 'nullable',
            'kd1_8' => 'nullable',
            'kd1_9' => 'nullable',
            'kd2_1' => 'nullable',
            'kd2_2' => 'nullable',
            'kd2_3' => 'nullable',
            'kd2_4' => 'nullable',
            'kd3_1' => 'nullable',
            'kd3_2' => 'nullable',
            'kd3_3' => 'nullable',
            'kd3_4' => 'nullable',
            'kkm' => 'nullable',
            'mapel' => 'required',
            'deskripsi' => 'required|max:255',
        ]);
        $nis = DataDiri::where('data_diris.nama_lengkap', '=', request()->nis)->first();
        $validatedData['nis'] = $nis->nis;
        KeterampilanNilai::create($validatedData);
        $slug = strtolower(str_replace(' ', '-', $request->mapel));
        return redirect('/dashboard/nilai/keterampilan/'.$slug)->with('success', 'Nilai Berhasil Ditambahkan');
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
    public function edit(KeterampilanNilai $keterampilan)
    {
        $mata_pelajaran = session()->get('mapel');
        return view('dashboard.data_nilai.keterampilan.edit',[
            'data_user' => DataDiri::where('nis', $keterampilan->nis)->get(),
            'data_nilai' => $keterampilan,
            'mapel' => $mata_pelajaran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeterampilanNilai $keterampilan)
    {
        $rules = [
            'kd1_1' => 'nullable',
            'kd1_2' => 'nullable',
            'kd1_3' => 'nullable',
            'kd1_4' => 'nullable',
            'kd1_5' => 'nullable',
            'kd1_6' => 'nullable',
            'kd1_7' => 'nullable',
            'kd1_8' => 'nullable',
            'kd1_9' => 'nullable',
            'kd2_1' => 'nullable',
            'kd2_2' => 'nullable',
            'kd2_3' => 'nullable',
            'kd2_4' => 'nullable',
            'kd3_1' => 'nullable',
            'kd3_2' => 'nullable',
            'kd3_3' => 'nullable',
            'kd3_4' => 'nullable',
            'kkm' => 'nullable',
            'mapel' => 'required',
            'deskripsi' => 'required|max:255',
        ];
        
        $mata_pelajaran = strtolower(str_replace(' ', '-', session()->get('mapel')));
        $validatedData = $request->validate($rules);
        KeterampilanNilai::where('id', $keterampilan->id)->update($validatedData);
        return redirect('/dashboard/nilai/keterampilan/'.$mata_pelajaran)->with('success', 'Nilai Berhasil Diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeterampilanNilai $keterampilan)
    {
        $mata_pelajaran = strtolower(str_replace(' ', '-', session()->get('mapel')));
        KeterampilanNilai::destroy($keterampilan->id);
        return redirect('/dashboard/nilai/keterampilan/'.$mata_pelajaran)->with('success', 'Nilai Siswa Telah Dihapus');
    }
}