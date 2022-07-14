@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Nilai Spiritual</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive ">
        <a href="/dashboard/nilai/spiritual/create" class="btn btn-primary mb-3">Buat Data Nilai Baru</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Taat Beribadah</th>
                    <th scope="col">Bersyukur</th>
                    <th scope="col">Berdoa</th>
                    <th scope="col">Toleransi</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
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
                        <td>
                            <a href="/dashboard/nilai/spiritual/{{ $item->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/nilai/spiritual/{{ $item->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin ?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
