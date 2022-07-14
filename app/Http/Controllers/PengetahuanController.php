<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\MapelDiampu;
use App\Models\PengetahuanNilai;
use Illuminate\Http\Request;

class PengetahuanController extends Controller
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
            return view('dashboard.data_nilai.pengetahuan.index', [
                'nilai_pengetahuan' => PengetahuanNilai::where('mapel', '=', $mapel_diampu->mapel)->get(),
                'mapel' => session()->get('mapel'),
                'kelas' => session()->get('kelas'),
            ]);
        } else {
            $mapel_diampu = MapelDiampu::where('nip_guru', auth()->user()->nomor_induk)
                                        ->where('mapel', $request->mapel)
                                        ->first();
            return view('dashboard.data_nilai.pengetahuan.index', [
                'nilai_pengetahuan' => PengetahuanNilai::where('mapel', '=', $mapel_diampu->mapel)->get(),
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
        $user = PengetahuanNilai::rightJoin('data_diris', 'data_diris.nis', '=', 'pengetahuan_nilais.nis')
                                    ->where('pengetahuan_nilais.mapel', $request->mapel)
                                    ->orderBy('nama_lengkap')
                                    ->get();
        $user_nilai = DataDiri::where('kelas', $request->kelas)->orderBy('nama_lengkap')->get();
        return view('dashboard.data_nilai.pengetahuan.create',[
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
            'kd2_1' => 'nullable',
            'kd2_2' => 'nullable',
            'kd2_3' => 'nullable',
            'kd2_4' => 'nullable',
            'kd3_1' => 'nullable',
            'kd3_2' => 'nullable',
            'kd3_3' => 'nullable',
            'kd3_4' => 'nullable',
            'kd4_1' => 'nullable',
            'kd4_2' => 'nullable',
            'kd4_3' => 'nullable',
            'kd4_4' => 'nullable',
            'kd5_1' => 'nullable',
            'kd5_2' => 'nullable',
            'kd5_3' => 'nullable',
            'kd5_4' => 'nullable',
            'pts' => 'nullable',
            'pas' => 'nullable',
            'mapel' => 'required',
            'deskripsi' => 'required|max:255',
        ]);
        $nis = DataDiri::where('data_diris.nama_lengkap', '=', request()->nis)->first();
        $validatedData['nis'] = $nis->nis;
        PengetahuanNilai::create($validatedData);
        $slug = strtolower(str_replace(' ', '-', $request->mapel));
        return redirect('/dashboard/nilai/pengetahuan/'.$slug)->with('success', 'Nilai Berhasil Ditambahkan');
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
    public function edit(PengetahuanNilai $data)
    {
        $mata_pelajaran = session()->get('mapel');
        return view('dashboard.data_nilai.pengetahuan.edit',[
            'data_user' => DataDiri::where('nis', $data->nis)->get(),
            'data_nilai' => $data,
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
    public function update(Request $request, PengetahuanNilai $data)
    {
        $rules = [
            'kd1_1' => 'nullable',
            'kd1_2' => 'nullable',
            'kd1_3' => 'nullable',
            'kd1_4' => 'nullable',
            'kd2_1' => 'nullable',
            'kd2_2' => 'nullable',
            'kd2_3' => 'nullable',
            'kd2_4' => 'nullable',
            'kd3_1' => 'nullable',
            'kd3_2' => 'nullable',
            'kd3_3' => 'nullable',
            'kd3_4' => 'nullable',
            'kd4_1' => 'nullable',
            'kd4_2' => 'nullable',
            'kd4_3' => 'nullable',
            'kd4_4' => 'nullable',
            'kd5_1' => 'nullable',
            'kd5_2' => 'nullable',
            'kd5_3' => 'nullable',
            'kd5_4' => 'nullable',
            'pts' => 'nullable',
            'pas' => 'nullable',
            'mapel' => 'required',
            'deskripsi' => 'nullable|max:255',
        ];
        
        $mata_pelajaran = strtolower(str_replace(' ', '-', session()->get('mapel')));
        $validatedData = $request->validate($rules);
        PengetahuanNilai::where('id', $data->id)->update($validatedData);
        return redirect('/dashboard/nilai/pengetahuan/'.$mata_pelajaran)->with('success', 'Nilai Berhasil Diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengetahuanNilai $data)
    {
        $mata_pelajaran = strtolower(str_replace(' ', '-', session()->get('mapel')));
        PengetahuanNilai::destroy($data->id);
        return redirect('/dashboard/nilai/pengetahuan/'.$mata_pelajaran)->with('success', 'Nilai Siswa Telah Dihapus');
    }
}