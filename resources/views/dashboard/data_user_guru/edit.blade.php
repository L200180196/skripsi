@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Guru {{ $data_user->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user-guru/{{ $data_user->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3" hidden>
                <label for="level" class="form-label">Status</label>
                <select class="form-select" name="level" id="level">
                    <option selected value="2">Guru</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="nama"
                    name="nama" required autofocus value="{{ old('nama', $data_user->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required autofocus value="{{ old('username', $data_user->username) }}" disabled>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control @error('e-mail') is-invalid @enderror" id="email"
                    name="email" required autofocus value="{{ old('email', $data_user->email) }}" disabled>
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
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
