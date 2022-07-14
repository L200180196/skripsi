<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\DataWaliKelas;

class DataDiriSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = DataWaliKelas::where('nip_guru', auth()->user()->nomor_induk)->first();
        return view('dashboard.data_siswa.index',[
            'kelas' => $kelas->kelas,
            'data_diri' => DataDiri::where('kelas', $kelas->kelas)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = DataWaliKelas::where('nip_guru', auth()->user()->nomor_induk)->first();
        return view('dashboard.data_siswa.create',[
            'kelas' => $kelas->kelas,
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
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required|max:255',
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        DataDiri::create($validatedData);
        return redirect('/dashboard/data-diri-siswa')->with('success', 'Data Siswa Berhasil Ditambahkan');
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
    public function edit(DataDiri $data_diri_siswa)
    {
        return view('dashboard.data_siswa.edit',[
            'data_diri' => $data_diri_siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDiri $data_diri_siswa)
    {
        $rules = [
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'no_telp' => 'required',
            'kelas' => 'required',
            'alamat' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        DataDiri::where('id', $data_diri_siswa->id)->update($validatedData);
        return redirect('/dashboard/data-diri-siswa')->with('success', 'Data Siswa Berhasil Diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataDiri $data_diri_siswa)
    {
        DataDiri::destroy($data_diri_siswa->id);
        return redirect('/dashboard/data-diri-siswa')->with('success', 'Data Diri Siswa Telah Dihapus');
    }
}