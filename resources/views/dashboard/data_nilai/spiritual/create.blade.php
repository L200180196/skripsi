@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengisian Nilai Spiritual Siswa</h1>
    </div>

    <div class="col-lg-4">
        <form action="/dashboard/nilai/spiritual" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Siswa</label>
                <select class="form-select" name="user_id" id="user_id">
                    @foreach ($data_user as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="taat_beribadah" class="form-label">Ketaatan Beribadah</label>
                <select class="form-select col-sm-2" name="taat_beribadah" id="taat_beribadah">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="syukur" class="form-label">Berperilaku Syukur</label>
                <select class="form-select col-sm-2" name="syukur" id="syukur">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="berdoa" class="form-label">Berdoa Sebelum dan Sesudah Kegiatan</label>
                <select class="form-select col-sm-2" name="berdoa" id="berdoa">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="toleransi" class="form-label">Toleransi Beribadah</label>
                <select class="form-select col-sm-2" name="toleransi" id="toleransi">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <div class="form-floating">
                    <textarea id="deskripsi" name="deskripsi" required autofocus
                        class="form-control @error('deskripsi') is-invalid @enderror" style="height: 100px"
                        value="{{ old('deskripsi') }}"></textarea>
                </div>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Buat Nilai Baru</button>
        </form>
    </div>
@endsection
