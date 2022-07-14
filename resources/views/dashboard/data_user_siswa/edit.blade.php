@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit User {{ $data_user->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/data-user/{{ $data_user->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="level" class="form-label">Guru / Siswa</label>
                <select class="form-select" name="level" id="level">
                    @if ($data_user->level == 3)
                        <option selected value="3">Siswa</option>
                        <option value="2">Guru</option>
                    @elseif ($data_user->level == 2)
                        <option selected value="2">Guru</option>
                        <option value="3">Siswa</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name', $data_user->name) }}">
                @error('name')
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
                <input type="text" class="form-control @error('e-mail') is-invalid @enderror" id="email" name="email"
                    required autofocus value="{{ old('email', $data_user->email) }}" disabled>
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
