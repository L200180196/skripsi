@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pilih Mata Pelajaran Guru {{ $data_user->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user-guru/mapel-kelas/{{ $data_user->id }}/edit" method="get" class="mb-5">
            <div class="mb-3">
                <label for="kelas" class="form-label">Mata Pelajaran Diampu</label>
                <select class="form-select" name="mata_pelajaran_diampu" id="mata_pelajaran_diampu">
                    @foreach ($mata_pelajaran_diampu as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="kelas" class="form-label">Kelas Tersedia</label>
                <select class="form-select" name="kelas" id="kelas">
                    @foreach ($kelas_tersedia as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Cek Kelas Tersedia</button>
        </form>
    </div>
@endsection
