@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengguna</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive ">
        <a href="/dashboard/data-user-guru/create" class="btn btn-primary mb-3">Tambah <span
                data-feather="user-plus"></span></a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center">Status Wali Kelas</th>
                    <th scope="col">Mata Pelajaran Diampu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center">
                            @if ($item->status_walikelas == 'active')
                                <form action="/dashboard/data-user-guru/wali-kelas/{{ $item->id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn bg-success text-white btn-sm"
                                        onclick="return confirm('Apakah Anda Yakin ?')">
                                        {{ strtoupper($item->status_walikelas) }}
                                    </button>
                                </form>
                            @elseif ($item->status_walikelas == 'non-active')
                                <a href="/dashboard/data-user-guru/wali-kelas/{{ $item->id }}/edit"
                                    class="btn btn-danger btn-sm">
                                    {{ strtoupper($item->status_walikelas) }}
                                </a>
                            @endif
                        </td>
                        <td class="col-6">{{ $item->DataGuru->mata_pelajaran_diampu }}
                            <a href="/dashboard/data-user-guru/mapel/{{ $item->id }}/edit" class="badge bg-primary">
                                <span data-feather="plus"></span>
                            </a>
                            <form action="/dashboard/data-user-guru/mapel/{{ $item->id }}" method="post"
                                class="d-inline">
                                @method('put')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin ?')">
                                    <span data-feather="trash-2"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="/dashboard/data-user-guru/{{ $item->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/data-user-guru/{{ $item->id }}" method="post" class="d-inline">
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
