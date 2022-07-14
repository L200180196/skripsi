@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengguna Baru</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="level" name="level" value=3 hidden>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Siswa</label>
                <select class="form-select" name="name" id="name">
                    @foreach ($nama as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">Nomor Induk Siswa</label>
                <input type="text" class="form-control" id="nis" name="nis" required
                    value="{{ old('username') }}">
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
