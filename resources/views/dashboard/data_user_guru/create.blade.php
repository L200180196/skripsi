@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengguna Baru</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user-guru" method="post" class="mb-5">
            @csrf
            <div class="mb-3" hidden>
                <select class="form-select" name="level" id="level">
                    <option selected value="2">Guru</option>
                </select>
            </div>
            <div class="mb-3" hidden>
                <input type="text" class="form-control" id="status_walikelas" name="status_walikelas" required autofocus
                    value="non-active">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nomor_induk" class="form-label">Nomor Induk Pegawai</label>
                <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror" id="nomor_induk"
                    name="nomor_induk" required autofocus value="{{ old('nomor_induk') }}">
                @error('nomor_induk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required autofocus value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control @error('e-mail') is-invalid @enderror" id="email"
                    name="email" required autofocus value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required autofocus value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Buat Pengguna Baru</button>
        </form>
    </div>
@endsection
