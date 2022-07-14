@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pilih Kelas Yang Ingin Ditampilkan</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="/dashboard/kelas" method="post" class="mb-5">
        @csrf
        <div class="col-md-6">
            <div class="form-floating mb-3" for="data">
                <select class="form-select" name="kelas" id="kelas">
                    <option selected>Pilih Kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <label for="floatingSelectGrid">Kelas</label>
            </div>
            <button type="submit" class="btn btn-primary">Pilih</button>
        </div>
    </form>
@endsection
