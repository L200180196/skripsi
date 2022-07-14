@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Nilai {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive ">
        <table class="table table-striped table-sm">
            <h1 class="h4">Nilai Spiritual</h1>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Taat Beribadah</th>
                    <th scope="col">Bersyukur</th>
                    <th scope="col">Berdoa</th>
                    <th scope="col">Toleransi</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_spiritual as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->taat_beribadah }}</td>
                        <td>{{ $item->syukur }}</td>
                        <td>{{ $item->berdoa }}</td>
                        <td>{{ $item->toleransi }}</td>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive ">
        <h1 class="h4">Nilai Sosial</h1>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jujur</th>
                    <th scope="col">Disiplin</th>
                    <th scope="col">Tanggung Jawab</th>
                    <th scope="col">Santun</th>
                    <th scope="col">Peduli</th>
                    <th scope="col">Percaya Diri</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_sosial as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->jujur }}</td>
                        <td>{{ $item->disiplin }}</td>
                        <td>{{ $item->tanggung_jawab }}</td>
                        <td>{{ $item->santun }}</td>
                        <td>{{ $item->peduli }}</td>
                        <td>{{ $item->percaya_diri }}</td>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
