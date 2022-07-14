@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
    </div>
    @if (auth()->user()->level == 2)
        <h1 class="h3">Wali Kelas : {{ $data_wali_kelas->kelas }}</h1>
        <h1 class="h3">Mata Pelajaran Diampu : {{ auth()->user()->DataGuru->mata_pelajaran_diampu }}</h1>
    @endif
@endsection
