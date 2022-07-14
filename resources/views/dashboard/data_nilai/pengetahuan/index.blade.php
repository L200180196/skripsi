@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Nilai Pengetahuan {{ $mapel }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{ session()->forget('mapel') }}
    {{ session()->forget('kelas') }}
    {{ Session::put('mapel', $mapel) }}
    {{ Session::put('kelas', $kelas) }}
    <div class="table-responsive ">
        <form action="/dashboard/nilai/pengetahuan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/create" method="get"
            class="mb-5">
            <input type="text" hidden class="form-control" id="mapel" name="mapel" value="{{ $mapel }}">
            <input type="text" hidden class="form-control" id="kelas" name="kelas" value="{{ $kelas }}">
            <button type="submit" class="btn btn-primary">Buat Data Nilai Baru</button>
        </form>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-center">Tema 1</th>
                    <th scope="col" class="text-center">Tema 2</th>
                    <th scope="col" class="text-center">Tema 3</th>
                    <th scope="col" class="text-center">Tema 4</th>
                    <th scope="col" class="text-center">Tema 5</th>
                    <th scope="col" class="text-center">Rata-Rata</th>
                    <th scope="col" class="text-center">Nilai PTS</th>
                    <th scope="col" class="text-center">Nilai PAS</th>
                    <th scope="col" class="text-center">Nilai Akhir</th>
                    <th scope="col">Predikat</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_pengetahuan as $item)
                    <p hidden>
                        {{ $collection = collect([
                            $item->kd1_1,
                            $item->kd1_2,
                            $item->kd1_3,
                            $item->kd1_4,
                            $item->kd2_1,
                            $item->kd2_2,
                            $item->kd2_3,
                            $item->kd2_4,
                            $item->kd3_1,
                            $item->kd3_2,
                            $item->kd3_3,
                            $item->kd3_4,
                            $item->kd4_1,
                            $item->kd4_2,
                            $item->kd4_3,
                            $item->kd4_4,
                            $item->kd5_1,
                            $item->kd5_2,
                            $item->kd5_3,
                            $item->kd5_4,
                        ]) }}
                        {{ $pembagi = 0 }}
                        {{ $a = 0 }}
                        {{ $nilai_harian = 0 }}
                    </p>
                    <p hidden>
                        @foreach ($collection as $i)
                            {{ $collection[$a] }}
                            {{ $nilai_harian = $nilai_harian + $collection[$a] }}
                            @if ($collection[$a] == null)
                                {{ $pembagi-- }}
                            @endif
                            {{ $pembagi++ }}
                            {{ $a++ }}
                        @endforeach
                        {{ $pembagi }}
                        {{ $a }}
                        {{ $nilai_harian = $nilai_harian / $pembagi }}
                        {{ round($nilai_akhir = (2 * round($nilai_harian) + $item->pts + $item->pas) / 4) }}
                    </p>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->data_diri->nama_lengkap }}</td>
                        <td class="text-center">
                            {{ $item->kd1_1 }}
                            {{ $item->kd1_2 }}
                            {{ $item->kd1_3 }}
                            {{ $item->kd1_4 }}
                        </td>
                        <td class="text-center">
                            {{ $item->kd2_1 }}
                            {{ $item->kd2_2 }}
                            {{ $item->kd2_3 }}
                            {{ $item->kd2_4 }}
                        </td>
                        <td class="text-center">
                            {{ $item->kd3_1 }}
                            {{ $item->kd3_2 }}
                            {{ $item->kd3_3 }}
                            {{ $item->kd3_4 }}
                        </td>
                        <td class="text-center">
                            {{ $item->kd4_1 }}
                            {{ $item->kd4_2 }}
                            {{ $item->kd4_3 }}
                            {{ $item->kd4_4 }}
                        </td>
                        <td class="text-center">
                            {{ $item->kd5_1 }}
                            {{ $item->kd5_2 }}
                            {{ $item->kd5_3 }}
                            {{ $item->kd5_4 }}
                        </td class="text-center">
                        <td class="text-center">{{ round($nilai_harian = $nilai_harian) }}</td>
                        <td class="text-center">{{ $item->pts }}</td>
                        <td class="text-center">{{ $item->pas }}</td>
                        <td class="text-center">{{ $akhir = round($nilai_akhir) }}</td>
                        <td>
                            @if ($akhir >= 90)
                                A
                            @elseif ($akhir >= 80)
                                B
                            @elseif ($akhir >= 70)
                                C
                            @elseif ($akhir >= 60)
                                D
                            @elseif ($akhir < 60)
                                E
                            @endif
                        </td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="/dashboard/nilai/pengetahuan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/{{ $item->id }}/edit"
                                class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form
                                action="/dashboard/nilai/pengetahuan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/{{ $item->id }}"
                                method="post" class="d-inline">
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
