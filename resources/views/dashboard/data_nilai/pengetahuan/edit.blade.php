@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Nilai Pengetahuan {{ session('mata') }} Siswa</h1>
    </div>
    <p>*Note
        Nilai KD Pada Tema Boleh Dikosongi jika tidak ada
    </p>
    <p>

    </p>
    <div class="col-lg-4">
        <form action="/dashboard/nilai/pengetahuan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/{{ $data_nilai->id }}"
            method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3" hidden>
                <input type="text" class="form-control" id="mapel" name="mapel" value="{{ $mapel }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap Siswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    @foreach ($data_user as $item) value="{{ old('nama_lengkap', $item->nama_lengkap) }}" disabled @endforeach>
            </div>
            <div class="mb-3">
                <label for="kd1_1" class="form-label">Tema 1</label>
                <div class="row align-items-start">
                    <div class="col">
                        <input type="text" class="form-control @error('kd1_1') is-invalid @enderror" id="kd1_1"
                            name="kd1_1" autofocus value="{{ old('kd1_1', $data_nilai->kd1_1) }}" placeholder="KD 1">
                        @error('kd1_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd1_2') is-invalid @enderror" id="kd1_2"
                            name="kd1_2" autofocus value="{{ old('kd1_2', $data_nilai->kd1_2) }}" placeholder="KD 2">
                        @error('kd1_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd1_3') is-invalid @enderror" id="kd1_3"
                            name="kd1_3" autofocus value="{{ old('kd1_3', $data_nilai->kd1_3) }}" placeholder="KD 3">
                        @error('kd1_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd1_4') is-invalid @enderror" id="kd1_4"
                            name="kd1_4" autofocus value="{{ old('kd1_4', $data_nilai->kd1_4) }}" placeholder="KD 4">
                        @error('kd1_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tema 2</label>
                <div class="row align-items-start">
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_1') is-invalid @enderror" id="kd2_1"
                            name="kd2_1" autofocus value="{{ old('kd2_1', $data_nilai->kd2_1) }}" placeholder="KD 1">
                        @error('kd2_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_2') is-invalid @enderror" id="kd2_2"
                            name="kd2_2" autofocus value="{{ old('kd2_2', $data_nilai->kd2_2) }}" placeholder="KD 2">
                        @error('kd2_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_3') is-invalid @enderror" id="kd2_3"
                            name="kd2_3" autofocus value="{{ old('kd2_3', $data_nilai->kd2_3) }}" placeholder="KD 3">
                        @error('kd2_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_4') is-invalid @enderror" id="kd2_4"
                            name="kd2_4" autofocus value="{{ old('kd2_4', $data_nilai->kd2_4) }}" placeholder="KD 4">
                        @error('kd2_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tema 3</label>
                <div class="row align-items-start">
                    <div class="col">
                        <input type="kd3_1" class="form-control @error('kd3_1') is-invalid @enderror" id="kd3_1"
                            name="kd3_1" autofocus value="{{ old('kd3_1', $data_nilai->kd3_1) }}" placeholder="KD 1">
                        @error('kd3_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd3_2') is-invalid @enderror" id="kd3_2"
                            name="kd3_2" autofocus value="{{ old('kd3_2', $data_nilai->kd3_2) }}"
                            placeholder="KD 2">
                        @error('kd3_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd3_3') is-invalid @enderror" id="kd3_3"
                            name="kd3_3" autofocus value="{{ old('kd3_3', $data_nilai->kd3_3) }}"
                            placeholder="KD 3">
                        @error('kd3_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd3_4') is-invalid @enderror" id="kd3_4"
                            name="kd3_4" autofocus value="{{ old('kd3_4', $data_nilai->kd3_4) }}"
                            placeholder="KD 4">
                        @error('kd3_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tema 4</label>
                <div class="row align-items-start">
                    <div class="col">
                        <input type="text" class="form-control @error('kd4_1') is-invalid @enderror" id="kd4_1"
                            name="kd4_1" autofocus value="{{ old('kd4_1', $data_nilai->kd4_1) }}"
                            placeholder="KD 1">
                        @error('kd4_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd4_2') is-invalid @enderror" id="kd4_2"
                            name="kd4_2" autofocus value="{{ old('kd4_2', $data_nilai->kd4_2) }}"
                            placeholder="KD 2">
                        @error('kd4_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd4_3') is-invalid @enderror" id="kd4_3"
                            name="kd4_3" autofocus value="{{ old('kd4_3', $data_nilai->kd4_3) }}"
                            placeholder="KD 3">
                        @error('kd4_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd4_4') is-invalid @enderror" id="kd4_4"
                            name="kd4_4" autofocus value="{{ old('kd4_4', $data_nilai->kd4_4) }}"
                            placeholder="KD 4">
                        @error('kd4_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tema 5</label>
                <div class="row align-items-start">
                    <div class="col">
                        <input type="text" class="form-control @error('kd5_1') is-invalid @enderror" id="kd5_1"
                            name="kd5_1" autofocus value="{{ old('kd5_1', $data_nilai->kd5_1) }}"
                            placeholder="KD 1">
                        @error('kd5_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd5_2') is-invalid @enderror" id="kd5_2"
                            name="kd5_2" autofocus value="{{ old('kd5_2', $data_nilai->kd5_2) }}"
                            placeholder="KD 2">
                        @error('kd5_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd5_3') is-invalid @enderror" id="kd5_3"
                            name="kd5_3" autofocus value="{{ old('kd5_3', $data_nilai->kd5_3) }}"
                            placeholder="KD 3">
                        @error('kd5_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd5_4') is-invalid @enderror" id="kd5_4"
                            name="kd5_4" autofocus value="{{ old('kd5_4', $data_nilai->kd5_4) }}"
                            placeholder="KD 4">
                        @error('kd5_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row align-items-start">
                    <div class="col">
                        <label for="name" class="form-label">Nilai PTS</label>
                        <input type="text" class="form-control @error('pts') is-invalid @enderror" id="pts"
                            name="pts" autofocus value="{{ old('pts', $data_nilai->pts) }}" placeholder="pts">
                        @error('pts')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="name" class="form-label">Nilai PAS</label>
                        <input type="text" class="form-control @error('pas') is-invalid @enderror" id="pas"
                            name="pas" autofocus value="{{ old('pas', $data_nilai->pas) }}" placeholder="pas">
                        @error('pas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <div class="form-floating">
                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                        style="height: 100px">{{ old('deskripsi', $data_nilai->deskripsi) }}</textarea>
                </div>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Nilai</button>
        </form>
    </div>
@endsection
