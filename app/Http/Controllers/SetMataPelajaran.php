<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\MapelDiampu;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Http\Request;

class SetMataPelajaran extends Controller
{
    public function delete(User $id)
    {
        $status = [
            'mata_pelajaran_diampu' => '',
        ];
        DataGuru::where('nip', $id->nomor_induk)->update($status);
        return redirect('/dashboard/data-user-guru')->with('success', 'Data Mata Pelajaran Berhasil Diperbarui');
    }

    public function editMapel(User $id)
    {
        $mata_pelajaran_diampu = MataPelajaran::get();
        return view('dashboard.data_user_guru.edit_mapel', [
            'data_user' => $id,
            'mata_pelajaran_diampu' => $mata_pelajaran_diampu ,
        ]);
    }

    public function editKelas(Request $request,User $id)
    {
        $kelas_tersedia = MapelDiampu::where('mapel', $request->mata_pelajaran_diampu)
                                        ->where('status', 'non-aktif')
                                        ->get();
        $mata_pelajaran_diampu = $request->mata_pelajaran_diampu;
        return view('dashboard.data_user_guru.edit_mapel_kelas', [
            'kelas_tersedia' => $kelas_tersedia,
            'data_user' => $id,
            'mata_pelajaran_diampu' => $mata_pelajaran_diampu ,
        ]);
    }

    public function update(Request $request, User $id)
    {
        $rules_mapel = [
            'nip_guru' => 'required',
            'status' => 'required',
        ];

        $rules_guru = [
            'mata_pelajaran_diampu' => 'required',
        ];
        $validatedDataMapel = $request->validate($rules_mapel);
        $validatedDataGuru = $request->validate($rules_guru);
        MapelDiampu::where('mapel', $request->mata_pelajaran_diampu)
                        ->where('kelas', $request->kelas)
                        ->update($validatedDataMapel);
        $mapel = DataGuru::where('nip', $request->nip_guru)->first();
        if ($mapel->mata_pelajaran_diampu == null) {
            DataGuru::where('nip', $id->nomor_induk)->update($validatedDataGuru);
            return redirect('/dashboard/data-user-guru')->with('success', 'Mata Pelajaran Berhasil Diperbarui');
        } else {
            $validatedDataGuru['mata_pelajaran_diampu'] = $mapel->mata_pelajaran_diampu .", ".$validatedDataGuru['mata_pelajaran_diampu'];
            DataGuru::where('nip', $id->nomor_induk)->update($validatedDataGuru);
            return redirect('/dashboard/data-user-guru')->with('success', 'Mata Pelajaran Berhasil Diperbarui');
        }
    }
}