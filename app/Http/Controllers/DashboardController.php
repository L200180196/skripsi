<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\DataWaliKelas;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'data_wali_kelas' => DataWaliKelas::where('nip_guru', auth()->user()->nomor_induk)->first(),
        ]);
    }
}