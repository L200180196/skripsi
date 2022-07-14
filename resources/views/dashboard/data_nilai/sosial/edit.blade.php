@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Nilai Sosial Siswa</h1>
    </div>

    <div class="col-lg-4">
        <form action="/dashboard/nilai/sosial/{{ $data_nilai->id }}" method="post" class="mb-5">
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
                <label for="jujur" class="form-label">Jujur</label>
                <select class="form-select col-sm-2" name="jujur" id="jujur">
                    @if ($data_nilai->jujur == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->jujur == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="disiplin" class="form-label">Disiplin</label>
                <select class="form-select col-sm-2" name="disiplin" id="disiplin">
                    @if ($data_nilai->disiplin == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->disiplin == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggung_jawab" class="form-label">Bertanggung Jawab</label>
                <select class="form-select col-sm-2" name="tanggung_jawab" id="tanggung_jawab">
                    @if ($data_nilai->tanggung_jawab == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->tanggung_jawab == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="santun" class="form-label">Santun</label>
                <select class="form-select col-sm-2" name="santun" id="santun">
                    @if ($data_nilai->santun == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->santun == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="peduli" class="form-label">Peduli</label>
                <select class="form-select col-sm-2" name="peduli" id="peduli">
                    @if ($data_nilai->peduli == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->peduli == 'PB')
                        <option selected value="PB">PB</option>
                        <option value="SB">SB</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="percaya_diri" class="form-label">santun Beribadah</label>
                <select class="form-select col-sm-2" name="percaya_diri" id="percaya_diri">
                    @if ($data_nilai->percaya_diri == 'SB')
                        <option selected value="SB">SB</option>
                        <option value="PB">PB</option>
                    @elseif ($data_nilai->percaya_diri == 'PB')
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
