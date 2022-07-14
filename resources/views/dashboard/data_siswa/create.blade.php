@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Data Siswa Baru</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-diri-siswa" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">Nomor Induk Siswa</label>
                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
                    required autofocus value="{{ old('nis') }}">
                @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                    name="nama_lengkap" required autofocus value="{{ old('nama_lengkap') }}">
                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $kelas }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telpon</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                    name="no_telp" required autofocus value="{{ old('no_telp') }}">
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
                        style="height: 100px">{{ old('alamat') }}</textarea>
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
