@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Siswa Kelas {{ $kelas }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive ">
        <a href="/dashboard/data-diri-siswa/create" class="btn btn-primary mb-3">Buat Data Siswa Baru</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_diri as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>
                            <a href="/dashboard/data-diri-siswa/{{ $item->id }}" class="badge bg-info">
                                <span data-feather="printer"></span>
                            </a>
                            <a href="/dashboard/data-diri-siswa/{{ $item->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/data-diri-siswa/{{ $item->id }}" method="post" class="d-inline">
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
