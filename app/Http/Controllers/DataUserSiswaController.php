<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\SpiritualNilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data_user_siswa.index',[
            'data_user' => User::where('level', '3')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar_user = DataDiri::where('user_id', null)->get();
        return view('dashboard.data_user_siswa.create',[
            'nama' => $daftar_user,
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
            'name' => 'required',
            'username' => 'required|max:255|unique:users',
            'level' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/dashboard/data-user-siswa')->with('success', 'Pengguna Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $data_user_siswa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $data_user_siswa)
    {
        return view('dashboard.data_user_siswa.edit',[
            'data_user' => $data_user_siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $data_user_siswa)
    {
        $rules = [
            'name' => 'required',
            'level' => 'required',
            'password' => 'required|min:5|max:255',
        ];
        
        $validatedData = $request->validate($rules);
        
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $data_user_siswa->id)->update($validatedData);
        return redirect('/dashboard/data-user-siswa')->with('success', 'User Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $data_user_siswa)
    {
        User::destroy($data_user_siswa->id);
        SpiritualNilai::where('user_id', $data_user_siswa->id)->delete();
        DataDiri::where('user_id', $data_user_siswa->id)->delete();
        return redirect('/dashboard/data-user-siswa')->with('success', 'User Telah Dihapus');
    }
}