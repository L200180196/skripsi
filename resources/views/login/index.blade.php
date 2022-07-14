@extends('layouts.main')
@section('container')
    <div class="container my-lg-4">
        <div class="row justify-content-center">
            <div class="mt-5 col-md-4 bg-dark p-5 rounded">
                <h1 class="text-center mb-5 text-white">Sistem Informasi Raport SDN Jurang Jero 2</h1>
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <main class="form-signin">
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="username"
                                class="my-2 form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Username" autofocus required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="my-2 form-control" id="password"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="my-2 w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
