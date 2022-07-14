@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengisian Nilai Sosial Siswa</h1>
    </div>

    <div class="col-lg-4">
        <form action="/dashboard/nilai/sosial" method="post" class="mb-5">
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
                <label for="jujur" class="form-label">Jujur</label>
                <select class="form-select col-sm-2" name="jujur" id="jujur">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="disiplin" class="form-label">Disiplin</label>
                <select class="form-select col-sm-2" name="disiplin" id="disiplin">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggung_jawab" class="form-label">Tanggung Jawab</label>
                <select class="form-select col-sm-2" name="tanggung_jawab" id="tanggung_jawab">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="santun" class="form-label">Santun</label>
                <select class="form-select col-sm-2" name="santun" id="santun">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="peduli" class="form-label">Peduli</label>
                <select class="form-select col-sm-2" name="peduli" id="peduli">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="percaya_diri" class="form-label">Percaya Diri</label>
                <select class="form-select col-sm-2" name="percaya_diri" id="percaya_diri">
                    <option value="SB">SB</option>
                    <option value="PB">PB</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <div class="form-floating">
                    <textarea id="deskripsi" name="deskripsi" required class="form-control @error('deskripsi') is-invalid @enderror"
                        style="height: 100px" value="{{ old('deskripsi') }}"></textarea>
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
