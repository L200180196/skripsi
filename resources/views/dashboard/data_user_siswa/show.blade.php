<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- Trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <h2 class="text-center my-5">RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h2>
        <div class="row justify-content-center mx-5">
            <div class="col-4">
                <div class="row">
                    <div class="col-4">Nama Peserta Didik</div>
                    <div class="col-1">:</div>
                    <div class="col">{{ $data_siswa->nama_lengkap }}</div>
                </div>
                <div class="row">
                    <div class="col-4">Nomor Induk</div>
                    <div class="col-1">:</div>
                    <div class="col">{{ $data_siswa->nis }}</div>
                </div>
                <div class="row">
                    <div class="col-4">Nama Sekolah</div>
                    <div class="col-1">:</div>
                    <div class="col">SD Negeri Jurangjero 2</div>
                </div>
                <div class="row">
                    <div class="col-4">Alamat Sekolah</div>
                    <div class="col-1">:</div>
                    <div class="col-6">Candirejo RT 01/RW 01 Jurangjero, Karangmalang, Sragen</div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-4">Kelas</div>
                    <div class="col-1">:</div>
                    <div class="col-2">{{ $data_siswa->kelas }}</div>
                </div>
                <div class="row">
                    <div class="col-4">Semester</div>
                    <div class="col-1">:</div>
                    <div class="col-2">2</div>
                </div>
                <div class="row">
                    <div class="col-4">Tahun Pelajaran</div>
                    <div class="col-1">:</div>
                    <div class="col-2">2021/2022</div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="/js/dashboard.js"></script>
</body>

</html>
