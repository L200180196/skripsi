<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\DataGuru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\SpiritualNilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data_user_guru.index',[
                    'data_user' => User::where('level', '2')->get(),
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data_user_guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateGuru = $request->validate([
            'nama' => 'required',
            'nip' => '',
        ]);
        $validateGuru['nip'] = $request->nomor_induk;

        $validatedData = $request->validate([
            'nama' => 'required',
            'status_walikelas' => 'required',
            'nomor_induk' => 'required',
            'username' => 'required|max:255|unique:users',
            'level' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        DataGuru::create($validateGuru);
        return redirect('/dashboard/data-user-guru')->with('success', 'Pengguna Berhasil Ditambahkan');
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
    public function edit(User $data_user_guru)
    {
        
        return view('dashboard.data_user_guru.edit',[
            'data_user' => $data_user_guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $data_user_guru)
    {
        $rules = [
            'nama' => 'required',
            'level' => 'required',
            'password' => 'required|min:5|max:255',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $data_user_guru->id)->update($validatedData);
        return redirect('/dashboard/data-user-guru')->with('success', 'User Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $data_user_guru)
    {
        User::destroy($data_user_guru->id);
        return redirect('/dashboard/data-user-guru')->with('success', 'User Telah Dihapus');
    }
}