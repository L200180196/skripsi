@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Siswa {{ $data_diri->nama_lengkap }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-diri-siswa/{{ $data_diri->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="nama_lengkap"
                    name="nama_lengkap" required autofocus value="{{ old('nama_lengkap', $data_diri->nama_lengkap) }}">
                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telpon</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                    name="no_telp" required autofocus value="{{ old('no_telp', $data_diri->no_telp) }}">
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <div class="form-floating">
                    <textarea id="alamat" name="alamat" required autofocus class="form-control @error('alamat') is-invalid @enderror"
                        style="height: 100px">{{ old('alamat', $data_diri->alamat) }}</textarea>
                </div>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Buat Data Siswa Baru</button>
        </form>
    </div>
@endsection
