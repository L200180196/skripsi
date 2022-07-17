@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->nama }}</h1>
    </div>
    @if (auth()->user()->level == 2)
        @if (auth()->user()->status_walikelas === 'non-active')
            <h1 class="h3">Wali Kelas : Non-active</h1>
        @elseif (auth()->user()->status_walikelas === 'active')
            <h1 class="h3">Wali Kelas : Kelas {{ $data_wali_kelas->kelas }}</h1>
        @endif

        @if (auth()->user()->DataGuru->mata_pelajaran_diampu == null)
            <h1 class="h3">Mata Pelajaran Diampu : Belum Ada</h1>
        @else
            <h1 class="h3">Mata Pelajaran Diampu : {{ auth()->user()->DataGuru->mata_pelajaran_diampu }}</h1>
        @endif
    @endif
@endsection
