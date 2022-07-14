@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Nilai Spiritual Siswa</h1>
    </div>

    <div class="col-lg-4">
        <form action="/dashboard/nilai/spiritual/{{ $data_nilai->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                    name="nama_lengkap" required autofocus disabled
                    @foreach ($data_user as $item) value="{{ old('nama_lengkap', $item->name) }}" @endforeach>
                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="taat_beribadah" class="form-label">Ketaatan Beribadah</label>
                <select class="form-select col-sm-2" name="taat_beribadah" id="taat_beribadah">
                    @if ($data_nilai->taat_beribadah == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->taat_beribadah == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="syukur" class="form-label">Berperilaku Syukur</label>
                <select class="form-select col-sm-2" name="syukur" id="syukur">
                    @if ($data_nilai->syukur == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->syukur == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="berdoa" class="form-label">Berdoa Sebelum dan Sesudah Kegiatan</label>
                <select class="form-select col-sm-2" name="berdoa" id="berdoa">
                    @if ($data_nilai->berdoa == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->berdoa == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="toleransi" class="form-label">Toleransi Beribadah</label>
                <select class="form-select col-sm-2" name="toleransi" id="toleransi">
                    @if ($data_nilai->toleransi == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->toleransi == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <div class="form-floating">
                    <textarea id="deskripsi" name="deskripsi" required class="form-control @error('deskripsi') is-invalid @enderror"
                        style="height: 100px">{{ old('deskripsi', $data_nilai->deskripsi) }}</textarea>
                </div>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Selesai Ganti Nilai</button>
        </form>
    </div>
@endsection
