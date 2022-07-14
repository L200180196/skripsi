@extends('dashboard.layouts.main')
@section('container')
    @if (auth()->user()->level == 1 || auth()->user()->level == 2)
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Pilih Data Nilai Yang Ingin Ditampilkan</h1>
        </div>
        @for ($x = 0; $x < count($data_mapel); $x++)
            @if ($data_mapel[0] == null)
                <a href="/dashboard/nilai/{{ strtolower(str_replace(' ', '-', $data_mapel[$x])) }}"
                    class="btn btn-primary mb-3" hidden>{{ $data_mapel[$x] }}</a>
            @else
                <form action="/dashboard/nilai/pengetahuan/{{ strtolower(str_replace(' ', '-', $data_mapel[$x])) }}"
                    method="get" class="mb-2">
                    <input type="text" hidden class="form-control" id="mapel" name="mapel"
                        value="{{ $data_mapel[$x] }}">
                    <button type="submit" class="btn btn-primary">Pengetahuan {{ $data_mapel[$x] }}</button>
                </form>
                <form action="/dashboard/nilai/keterampilan/{{ strtolower(str_replace(' ', '-', $data_mapel[$x])) }}"
                    method="get" class="mb-2">
                    <input type="text" hidden class="form-control" id="mapel" name="mapel"
                        value="{{ $data_mapel[$x] }}">
                    <button type="submit" class="btn btn-info">Keterampilan {{ $data_mapel[$x] }}</button>
                </form>
            @endif
        @endfor
        {{-- For SISWA --}}
    @else
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Nilai Siswa {{ auth()->user()->name }} </h1>
        </div>
        <h1 class="h3">Nilai Spiritual</h1>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Taat Beribadah</th>
                    <th scope="col">Bersyukur</th>
                    <th scope="col">Berdoa</th>
                    <th scope="col">Toleransi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_spiritual as $item)
                    <tr>
                        <td>{{ $item->taat_beribadah }}</td>
                        <td>{{ $item->syukur }}</td>
                        <td>{{ $item->berdoa }}</td>
                        <td>{{ $item->toleransi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="h3">Nilai Sosial</h1>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Jujur</th>
                    <th scope="col">Disiplin</th>
                    <th scope="col">Tanggung Jawab</th>
                    <th scope="col">Santun</th>
                    <th scope="col">Peduli</th>
                    <th scope="col">Percaya Diri</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_sosial as $item)
                    <tr>
                        <td>{{ $item->jujur }}</td>
                        <td>{{ $item->disiplin }}</td>
                        <td>{{ $item->tanggung_jawab }}</td>
                        <td>{{ $item->santun }}</td>
                        <td>{{ $item->peduli }}</td>
                        <td>{{ $item->percaya_diri }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="h3">Nilai Pengetahuan</h1>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Mata Pelajaran</th>
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
                        <td>{{ $item->mapel }}</td>
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
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
    @endif
@endsection
