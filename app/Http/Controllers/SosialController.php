<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\User;
use App\Models\SosialNilai;

class SosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data_nilai.sosial.index',[
            'nilai_sosial' => SosialNilai::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = SosialNilai::rightJoin('users', 'users.id', '=', 'sosial_nilais.user_id')
                                ->where('users.level', '=', 3)
                                ->where('sosial_nilais.user_id', '=', null)
                                ->get();
        return view('dashboard.data_nilai.sosial.create',[
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
            'user_id' => 'required',
            'jujur' => 'required',
            'disiplin' => 'required',
            'tanggung_jawab' => 'required',
            'santun' => 'required',
            'peduli' => 'required',
            'percaya_diri' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        SosialNilai::create($validatedData);
        return redirect('/dashboard/nilai/sosial')->with('success', 'Nilai Berhasil Ditambahkan');
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
    public function edit(SosialNilai $sosial)
    {
        return view('dashboard.data_nilai.sosial.edit',[
            'data_user' => User::where('id', $sosial->user_id)->get(),
            'data_nilai' => $sosial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SosialNilai $sosial)
    {
        $rules = [
            'jujur' => 'required',
            'disiplin' => 'required',
            'tanggung_jawab' => 'required',
            'santun' => 'required',
            'peduli' => 'required',
            'percaya_diri' => 'required',
            'deskripsi' => 'required|max:255',
        ];
        
        $validatedData = $request->validate($rules);
        SosialNilai::where('id', $sosial->id)->update($validatedData);
        return redirect('/dashboard/nilai/sosial')->with('success', 'Nilai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SosialNilai $sosial)
    {
        SosialNilai::destroy($sosial->id);
        return redirect('/dashboard/nilai/sosial')->with('success', 'Nilai Siswa Telah Dihapus');
    }
}