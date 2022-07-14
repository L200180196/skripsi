<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpiritualNilai;
use App\Models\DataDiri;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SpiritualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data_nilai.spiritual.index',[
            'data_diri' => DataDiri::where('user_id', auth()->user()->id)->get(),
            'nilai_spiritual' => SpiritualNilai::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = SpiritualNilai::rightJoin('users', 'users.id', '=', 'spiritual_nilais.user_id')
                                ->where('users.level', '=', 3)
                                ->where('spiritual_nilais.user_id', '=', null)
                                ->get();
        return view('dashboard.data_nilai.spiritual.create',[
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
            'taat_beribadah' => 'required',
            'syukur' => 'required',
            'berdoa' => 'required',
            'toleransi' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        SpiritualNilai::create($validatedData);
        return redirect('/dashboard/nilai/spiritual')->with('success', 'Nilai Berhasil Ditambahkan');
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
    public function edit(SpiritualNilai $spiritual)
    {
        return view('dashboard.data_nilai.spiritual.edit',[
            'data_user' => User::where('id', $spiritual->user_id)->get(),
            'data_nilai' => $spiritual,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpiritualNilai $spiritual)
    {
        $rules = [
            'taat_beribadah' => 'required',
            'syukur' => 'required',
            'berdoa' => 'required',
            'toleransi' => 'required',
            'deskripsi' => 'required|max:255',
        ];
        
        $validatedData = $request->validate($rules);
        SpiritualNilai::where('id', $spiritual->id)->update($validatedData);
        return redirect('/dashboard/nilai/spiritual')->with('success', 'Nilai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpiritualNilai $spiritual)
    {
        SpiritualNilai::destroy($spiritual->id);
        return redirect('/dashboard/nilai/spiritual')->with('success', 'Nilai Siswa Telah Dihapus');
    }
}