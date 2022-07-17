@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Nilai Keterampilan </h1>

    </div>
    <h1 class="h2 mb-3">Mata Pelajaran {{ $mapel }}</h1>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive ">
        <form action="/dashboard/nilai/keterampilan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/create" method="get"
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
                    <th scope="col" class="text-center">Praktek</th>
                    <th scope="col" class="text-center">Produk</th>
                    <th scope="col" class="text-center">Proyek</th>
                    <th scope="col" class="text-center">Skor Akhir</th>
                    <th scope="col">KKM Sat. Pend</th>
                    <th scope="col">Predikat</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_keterampilan as $item)
                    <p hidden>
                        {{ $collection1 = collect([
                            $item->kd1_1,
                            $item->kd1_2,
                            $item->kd1_3,
                            $item->kd1_4,
                            $item->kd1_5,
                            $item->kd1_6,
                            $item->kd1_7,
                            $item->kd1_8,
                            $item->kd1_9,
                        ]) }}
                        {{ $collection2 = collect([$item->kd2_1, $item->kd2_2, $item->kd2_3, $item->kd2_4]) }}
                        {{ $collection3 = collect([$item->kd3_1, $item->kd3_2, $item->kd3_3, $item->kd3_4]) }}

                        {{ $pembagi1 = 0 }}
                        {{ $a1 = 0 }}
                        {{ $nilai_harian1 = 0 }}
                        {{ $pembagi2 = 0 }}
                        {{ $a2 = 0 }}
                        {{ $nilai_harian2 = 0 }}
                        {{ $pembagi3 = 0 }}
                        {{ $a3 = 0 }}
                        {{ $nilai_harian3 = 0 }}
                    </p>
                    <p hidden>
                        @foreach ($collection1 as $i)
                            {{ $collection1[$a1] }}
                            {{ $nilai_harian1 = $nilai_harian1 + $collection1[$a1] }}
                            @if ($collection1[$a1] == null)
                                {{ $pembagi1-- }}
                            @endif
                            {{ $pembagi1++ }}
                            {{ $a1++ }}
                        @endforeach
                        @if ($nilai_harian1 == null)
                            {{ $nilai_harian1 = 0 }}
                        @else
                            {{ $nilai_harian1 = $nilai_harian1 / $pembagi1 }}
                        @endif

                    </p>
                    <p hidden>
                        @foreach ($collection2 as $i)
                            {{ $collection2[$a2] }}
                            {{ $nilai_harian2 = $nilai_harian2 + $collection2[$a2] }}
                            @if ($collection1[$a2] == null)
                                {{ $pembagi2-- }}
                            @endif
                            {{ $pembagi2++ }}
                            {{ $a2++ }}
                        @endforeach
                        @if ($nilai_harian2 == null)
                            {{ $nilai_harian2 = 0 }}
                        @else
                            {{ $nilai_harian2 = $nilai_harian2 / $pembagi2 }}
                        @endif
                    </p>
                    <p hidden>
                        @foreach ($collection3 as $i)
                            {{ $collection3[$a3] }}
                            {{ $nilai_harian3 = $nilai_harian3 + $collection3[$a3] }}
                            @if ($collection3[$a3] == null)
                                {{ $pembagi3-- }}
                            @endif
                            {{ $pembagi3++ }}
                            {{ $a3++ }}
                        @endforeach
                        @if ($nilai_harian3 == null)
                            {{ $nilai_harian3 = 0 }}
                        @else
                            {{ $nilai_harian3 = $nilai_harian3 / $pembagi3 }}
                        @endif
                    </p>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->Data_Diri->nama_lengkap }}</td>
                        <td class="text-center">
                            {{ $item->kd1_1 }}
                            {{ $item->kd1_2 }}
                            {{ $item->kd1_3 }}
                            {{ $item->kd1_4 }}
                            {{ $item->kd1_5 }}
                            {{ $item->kd1_6 }}
                            {{ $item->kd1_7 }}
                            {{ $item->kd1_8 }}
                            {{ $item->kd1_9 }}
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
                            {{ round($nilai_akhir = ($nilai_harian1 + $nilai_harian2 + $nilai_harian3) / 3) }}</td>
                        <td>kkm</td>
                        <td>predikat</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="/dashboard/nilai/keterampilan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/{{ $item->id }}/edit"
                                class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form
                                action="/dashboard/nilai/keterampilan/{{ strtolower(str_replace(' ', '-', $mapel)) }}/{{ $item->id }}"
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
