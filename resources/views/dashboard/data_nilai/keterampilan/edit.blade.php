@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengisian Nilai Keterampilan {{ session('mata') }} Siswa</h1>
    </div>
    <p>*Note
        Nilai KD Pada Tema Boleh Dikosongi jika tidak ada
    </p>
    <p>

    </p>
    <div class="col-lg-5">
        <form
            action="/dashboard/nilai/keterampilan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/{{ $data_nilai->id }}"
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
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control @error('kd1_1') is-invalid @enderror" id="kd1_1"
                            name="kd1_1" autofocus value="{{ old('kd1_1', $data_nilai->kd1_1) }}" placeholder="KD 1">
                        @error('kd1_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_2') is-invalid @enderror" id="kd1_2"
                            name="kd1_2" autofocus value="{{ old('kd1_2', $data_nilai->kd1_2) }}" placeholder="KD 2">
                        @error('kd1_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_3') is-invalid @enderror" id="kd1_3"
                            name="kd1_3" autofocus value="{{ old('kd1_3', $data_nilai->kd1_3) }}" placeholder="KD 3">
                        @error('kd1_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_4') is-invalid @enderror" id="kd1_4"
                            name="kd1_4" autofocus value="{{ old('kd1_4', $data_nilai->kd1_4) }}" placeholder="KD 4">
                        @error('kd1_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control @error('kd1_5') is-invalid @enderror" id="kd1_5"
                            name="kd1_5" autofocus value="{{ old('kd1_5', $data_nilai->kd1_5) }}" placeholder="KD 5">
                        @error('kd1_5')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_6') is-invalid @enderror" id="kd1_6"
                            name="kd1_6" autofocus value="{{ old('kd1_6', $data_nilai->kd1_6) }}" placeholder="KD 6">
                        @error('kd1_6')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_7') is-invalid @enderror" id="kd1_7"
                            name="kd1_7" autofocus value="{{ old('kd1_7', $data_nilai->kd1_7) }}" placeholder="KD 7">
                        @error('kd1_7')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_8') is-invalid @enderror" id="kd1_8"
                            name="kd1_8" autofocus value="{{ old('kd1_8', $data_nilai->kd1_8) }}" placeholder="KD 8">
                        @error('kd1_8')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control @error('kd1_9') is-invalid @enderror" id="kd1_9"
                            name="kd1_9" autofocus value="{{ old('kd1_9', $data_nilai->kd1_9) }}" placeholder="KD 9">
                        @error('kd1_9')
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
                            name="kd2_1" autofocus value="{{ old('kd2_1', $data_nilai->kd2_1) }}"
                            placeholder="KD 1">
                        @error('kd2_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_2') is-invalid @enderror" id="kd2_2"
                            name="kd2_2" autofocus value="{{ old('kd2_2', $data_nilai->kd2_2) }}"
                            placeholder="KD 2">
                        @error('kd2_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_3') is-invalid @enderror" id="kd2_3"
                            name="kd2_3" autofocus value="{{ old('kd2_3', $data_nilai->kd2_3) }}"
                            placeholder="KD 3">
                        @error('kd2_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('kd2_4') is-invalid @enderror" id="kd2_4"
                            name="kd2_4" autofocus value="{{ old('kd2_4', $data_nilai->kd2_4) }}"
                            placeholder="KD 4">
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
                            name="kd3_1" autofocus value="{{ old('kd3_1', $data_nilai->kd3_1) }}"
                            placeholder="KD 1">
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
                <div class="row align-items-start">
                    <div class="col">
                        <label for="kkm" class="form-label">KKM Satuan Pendidik</label>
                        <input type="text" class="form-control @error('pts') is-invalid @enderror" id="kkm"
                            name="kkm" autofocus value="{{ old('kkm'), $data_nilai->kkm }}" placeholder="KKM">
                        @error('kkm')
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
            <button type="submit" class="btn btn-primary">Buat Nilai Baru</button>
        </form>
    </div>
@endsection
