@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengaktifan Wali Kelas {{ $data_user->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user-guru/wali-kelas/{{ $data_user->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3" hidden>
                <select class="form-select" name="status_walikelas" id="status_walikelas">
                    <option selected value="active"></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nip_guru" class="form-label">Nomor Induk Pegawai</label>
                <input type="text" class="form-control" id="nip_guru" name="nip_guru" required
                    value="{{ old('nip_guru', $data_user->nomor_induk) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="name"
                    name="name" required value="{{ old('name', $data_user->name) }}" readonly>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas Tersedia</label>
                <select class="form-select" name="kelas" id="kelas">
                    @foreach ($kelas_tersedia as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pilih Kelas</button>
        </form>
    </div>
@endsection
