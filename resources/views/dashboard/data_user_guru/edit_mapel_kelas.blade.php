@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pilih Mata Pelajaran Guru {{ $data_user->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user-guru/mapel-kelas/{{ $data_user->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="nip_guru" name="nip_guru"
                    value="{{ $data_user->nomor_induk }}" hidden>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="status" name="status" value="aktif" hidden>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Mata Pelajaran Diampu</label>
                <select class="form-select" name="mata_pelajaran_diampu" id="mata_pelajaran_diampu">
                    <option value="{{ $mata_pelajaran_diampu }}">{{ $mata_pelajaran_diampu }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas Tersedia</label>
                <select class="form-select" name="kelas" id="kelas">
                    @foreach ($kelas_tersedia as $item)
                        <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Mata Pelajaran dan Kelas Yang Dipilih</button>
        </form>
    </div>
@endsection
