<?php

namespace App\Http\Controllers;

use App\Models\DataWaliKelas;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class SetWaliKelas extends Controller
{
    public function edit(User $id)
    {
        $kelas = Kelas::leftJoin('data_wali_kelas', 'data_wali_kelas.kelas', 'kelas.nama')
                        ->where('data_wali_kelas.id', '=', null)->get();
        return view('dashboard.data_user_guru.edit_wali',[
            'kelas_tersedia' => $kelas ,
            'data_user' => $id
        ]);
    }

    public function update(Request $request, User $id)
    {
        $rules1 = [
            'status_walikelas' => 'required',
        ];
        $rules2 = [
            'nip_guru' => 'required',
            'kelas' => 'required',
        ];

        $validatedData1 = $request->validate($rules1);
        $validatedData2 = $request->validate($rules2);

        User::where('id', $id->id)->update($validatedData1);
        DataWaliKelas::create($validatedData2);
        return redirect('/dashboard/data-user-guru')->with('success', 'Data Wali Kelas Berhasil Diperbarui');
    }

    public function destroy(User $id)
    {
        $status = [
            'status_walikelas' => 'non-active',
        ];
        User::where('id', $id->id)->update($status);
        DataWaliKelas::where('nip_guru', $id->nomor_induk)->delete();
        return redirect('/dashboard/data-user-guru')->with('success', 'Data Wali Kelas Berhasil Diperbarui');
    }
}