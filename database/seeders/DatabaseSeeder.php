<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\User;
Use App\Models\DataDiri;
use App\Models\DataGuru;
use App\Models\DataWaliKelas;
use App\Models\Kelas;
use App\Models\KeterampilanNilai;
use App\Models\MapelDiampu;
use App\Models\MataPelajaran;
use App\Models\SpiritualNilai;
use App\Models\SosialNilai;
use App\Models\PengetahuanNilai;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        MataPelajaran::create(['nama' => 'Pendidikan Agama dan Budi Pekerti',]);
        MataPelajaran::create(['nama' => 'Pendidikan Pancasila dan Kewarganegaraan',]);
        MataPelajaran::create(['nama' => 'Bahasa Indonesia',]);
        MataPelajaran::create(['nama' => 'Matematika',]);
        MataPelajaran::create(['nama' => 'Seni Budaya dan Prakarya',]);
        MataPelajaran::create(['nama' => 'Pendidikan Jasmani Olahraga dan Kesehatan',]);
        MataPelajaran::create(['nama' => 'Bahasa Jawa',]);

        User::create([
            'nama' => 'admin',
            'level' => '1',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'nama' => 'Indah Kusuma',
            'nomor_induk' => 1,
            'level' => '2',
            'username' => 'guru1',
            'email' => 'guru1@gmail.com',
            'status_walikelas' => 'active',
            'password' => Hash::make('guru1'),
        ]);

        User::create([
            'nama' => 'Hasan Basri',
            'nomor_induk' => 2,
            'level' => '2',
            'username' => 'guru2',
            'email' => 'guru2@gmail.com',
            'status_walikelas' => 'active',
            'password' => Hash::make('guru2'),
        ]);

        User::create([
            'nama' => 'Ratnasari',
            'nomor_induk' => 3,
            'level' => '2',
            'username' => 'guru3',
            'email' => 'guru3@gmail.com',
            'status_walikelas' => 'non-active',
            'password' => Hash::make('guru3'),
        ]);

        User::create([
            'nama' => 'Aria Kusuma',
            'nomor_induk' => 4,
            'level' => '2',
            'username' => 'guru4',
            'email' => 'guru4@gmail.com',
            'status_walikelas' => 'non-active',
            'password' => Hash::make('guru4'),
        ]);
        
        User::create([
            'nama' => 'Amartya Maulana',
            'nomor_induk' => 4567,
            'level' => '3',
            'username' => 'siswa1',
            'email' => 'siswa1@gmail.com',
            'password' => Hash::make('siswa'),
        ]);

        User::create([
            'nama' => 'M. Ahyatul Fajri',
            'nomor_induk' => 5436,
            'level' => '3',
            'username' => 'siswa2',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('siswa'),
        ]);

        User::create([
            'nama' => 'M. Irfan',
            'nomor_induk' => 4321,
            'level' => '3',
            'username' => 'siswa3',
            'email' => 'siswa3@gmail.com',
            'password' => Hash::make('siswa'),
        ]);
        User::create([
            'nama' => 'Arif Fudholi',
            'nomor_induk' => 5642,
            'level' => '3',
            'username' => 'siswa4',
            'email' => 'siswa4@gmail.com',
            'password' => Hash::make('siswa'),
        ]);

        DataDiri::create([
            'user_id' => '3',
            'nis' => 4567,
            'nama_lengkap' => 'Amartya Maulana',
            'kelas' => 3,
            'no_telp' => '1234',
            'alamat' => 'jalan ums',
        ]);

        DataDiri::create([
            'user_id' => '4',
            'nis' => 5436,
            'nama_lengkap' => 'M. Ahyatul Fajri',
            'kelas' => 3,
            'no_telp' => '4321',
            'alamat' => 'jalan gonilan',
        ]);

        DataDiri::create([
            'user_id' => '5',
            'nis' => 4321,
            'nama_lengkap' => 'M. Irfan',
            'kelas' => 4,
            'no_telp' => '0123',
            'alamat' => 'jalan garuda',
        ]);

        DataDiri::create([
            'user_id' => '6',
            'nis' => 5642,
            'nama_lengkap' => 'Arif Fudholi',
            'kelas' => 4,
            'no_telp' => '3210',
            'alamat' => 'jalan blulukan',
        ]);


        SpiritualNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'taat_beribadah' => 'SB',
            'syukur' => 'SB',
            'berdoa' => 'SB',
            'toleransi' => 'SB',
            'deskripsi' => 'Tidak Perlu Bimbingan',
        ]);

        SpiritualNilai::create([
            'nis' => '5436',
            'kelas' => '3',
            'taat_beribadah' => 'PB',
            'syukur' => 'PB',
            'berdoa' => 'PB',
            'toleransi' => 'PB',
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        SosialNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'jujur' => 'PB',
            'disiplin' => 'PB',
            'tanggung_jawab' => 'PB',
            'santun' => 'PB',
            'peduli' => 'PB',
            'percaya_diri' => 'PB',
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        SosialNilai::create([
            'nis' => '5436',
            'kelas' => '3',
            'jujur' => 'PB',
            'disiplin' => 'PB',
            'tanggung_jawab' => 'PB',
            'santun' => 'PB',
            'peduli' => 'PB',
            'percaya_diri' => 'PB',
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        PengetahuanNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kd1_1' => 75,
            'kd1_2' => 80,
            'kd1_3' => 90,
            'kd1_4' => 67,
            'kd2_1' => 75,
            'kd2_2' => 61,
            'kd2_3' => 78,
            'kd2_4' => 86,
            'kd3_1' => 100,
            'kd3_2' => 80,
            'kd3_3' => 90,
            'kd3_4' => 100,
            'kd4_1' => 75,
            'kd4_2' => 80,
            'kd4_3' => 90,
            'kd4_4' => 100,
            'kd5_1' => 66,
            'kd5_2' => 77,
            'kd5_3' => 89,
            'kd5_4' => 96,
            'pts' => 70,
            'pas' => 75,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        PengetahuanNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'mapel' => 'Matematika',
            'kd1_1' => 75,
            'kd1_2' => 80,
            'kd1_3' => 90,
            'kd1_4' => 67,
            'kd2_1' => 75,
            'kd2_2' => 61,
            'kd2_3' => 78,
            'kd2_4' => 86,
            'kd3_1' => 100,
            'kd3_2' => 80,
            'kd3_3' => 90,
            'kd3_4' => 100,
            'kd4_1' => 75,
            'kd4_2' => 80,
            'kd4_3' => 90,
            'kd4_4' => 100,
            'kd5_1' => 66,
            'kd5_2' => 77,
            'kd5_3' => 89,
            'kd5_4' => 96,
            'pts' => 90,
            'pas' => 100,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        PengetahuanNilai::create([
            'nis' => '5436',
            'kelas' => '3',
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kd1_1' => 69,
            'kd1_2' => 50,
            'kd1_3' => 60,
            'kd1_4' => 78,
            'kd2_1' => 90,
            'kd2_2' => 80,
            'kd2_3' => 67,
            'kd2_4' => 77,
            'kd3_1' => 95,
            'kd3_2' => 50,
            'kd3_3' => 50,
            'kd3_4' => 100,
            'kd4_1' => 66,
            'kd4_2' => 55,
            'kd4_3' => 44,
            'kd4_4' => 88,
            'kd5_1' => 67,
            'kd5_2' => 75,
            'kd5_3' => 71,
            'kd5_4' => 86,
            'pts' => 60,
            'pas' => 65,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        KeterampilanNilai::create([
            'nis' => '5436',
            'kelas' => '3',
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kd1_1' => 69,
            'kd1_2' => 50,
            'kd1_3' => 60,
            'kd1_4' => null,
            'kd1_5' => 90,
            'kd1_6' => null,
            'kd1_7' => null,
            'kd1_8' => null,
            'kd1_9' => 100,
            'kd2_1' => 50,
            'kd2_2' => 50,
            'kd2_3' => 100,
            'kd2_4' => 66,
            'kd3_1' => 55,
            'kd3_2' => 44,
            'kd3_3' => 88,
            'kd3_4' => null,
            'kkm' => null,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        KeterampilanNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kd1_1' => 69,
            'kd1_2' => 50,
            'kd1_3' => 60,
            'kd1_4' => null,
            'kd1_5' => 90,
            'kd1_6' => null,
            'kd1_7' => null,
            'kd1_8' => null,
            'kd1_9' => 100,
            'kd2_1' => 50,
            'kd2_2' => 50,
            'kd2_3' => 100,
            'kd2_4' => 66,
            'kd3_1' => 55,
            'kd3_2' => 44,
            'kd3_3' => 88,
            'kd3_4' => null,
            'kkm' => null,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        KeterampilanNilai::create([
            'nis' => '5436',
            'kelas' => '3',
            'mapel' => 'Matematika',
            'kd1_1' => 69,
            'kd1_2' => 50,
            'kd1_3' => 60,
            'kd1_4' => null,
            'kd1_5' => 90,
            'kd1_6' => null,
            'kd1_7' => null,
            'kd1_8' => null,
            'kd1_9' => 100,
            'kd2_1' => 50,
            'kd2_2' => 50,
            'kd2_3' => 100,
            'kd2_4' => 66,
            'kd3_1' => 55,
            'kd3_2' => 44,
            'kd3_3' => 88,
            'kd3_4' => null,
            'kkm' => null,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        KeterampilanNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'mapel' => 'Matematika',
            'kd1_1' => 69,
            'kd1_2' => 50,
            'kd1_3' => 60,
            'kd1_4' => null,
            'kd1_5' => 90,
            'kd1_6' => null,
            'kd1_7' => null,
            'kd1_8' => null,
            'kd1_9' => 100,
            'kd2_1' => 50,
            'kd2_2' => 50,
            'kd2_3' => 100,
            'kd2_4' => 66,
            'kd3_1' => 55,
            'kd3_2' => 44,
            'kd3_3' => 88,
            'kd3_4' => null,
            'kkm' => null,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        KeterampilanNilai::create([
            'nis' => '4567',
            'kelas' => '3',
            'mapel' => 'Seni Budaya dan Prakarya',
            'kd1_1' => 100,
            'kd1_2' => 50,
            'kd1_3' => 100,
            'kd1_4' => 75,
            'kd1_5' => 90,
            'kd1_6' => 90,
            'kd1_7' => null,
            'kd1_8' => null,
            'kd1_9' => 100,
            'kd2_1' => 50,
            'kd2_2' => 50,
            'kd2_3' => 100,
            'kd2_4' => 66,
            'kd3_1' => 55,
            'kd3_2' => 44,
            'kd3_3' => 88,
            'kd3_4' => 100,
            'kkm' => null,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        KeterampilanNilai::create([
            'nis' => '5436',
            'kelas' => '3',
            'mapel' => 'Seni Budaya dan Prakarya',
            'kd1_1' => 69,
            'kd1_2' => 50,
            'kd1_3' => 60,
            'kd1_4' => null,
            'kd1_5' => 90,
            'kd1_6' => null,
            'kd1_7' => null,
            'kd1_8' => null,
            'kd1_9' => 100,
            'kd2_1' => 50,
            'kd2_2' => 50,
            'kd2_3' => 100,
            'kd2_4' => 66,
            'kd3_1' => 55,
            'kd3_2' => 44,
            'kd3_3' => 88,
            'kd3_4' => null,
            'kkm' => null,
            'deskripsi' => 'Perlu Bimbingan',
        ]);

        Kelas::create([
            'nama' => 1
        ]);

        Kelas::create([
            'nama' => 2
        ]);

        Kelas::create([
            'nama' => 3
        ]);

        Kelas::create([
            'nama' => 4
        ]);

        Kelas::create([
            'nama' => 5
        ]);

        Kelas::create([
            'nama' => 6
        ]);

        DataGuru::create([
            'nip' => 001,
            'nama' => 'Indah Kusuma',
        ]);

        DataGuru::create([
            'nip' => 002,
            'nama' => 'Hasan Basri',
        ]);

        DataGuru::create([
            'nip' => 003,
            'nama' => 'Ratnasari',
        ]);

        DataGuru::create([
            'nip' => 004,
            'nama' => 'Aria Kusuma',
        ]);

        DataWaliKelas::create([
            'nip_guru' => 001,
            'kelas' => 3
        ]);

        DataWaliKelas::create([
            'nip_guru' => 002,
            'kelas' => 4
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Indonesia',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Matematika',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Matematika',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Matematika',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Matematika',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Matematika',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Matematika',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Seni Budaya dan Prakarya',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Seni Budaya dan Prakarya',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Seni Budaya dan Prakarya',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Seni Budaya dan Prakarya',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Seni Budaya dan Prakarya',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Seni Budaya dan Prakarya',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Jawa',
            'kelas' => 1,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Jawa',
            'kelas' => 2,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Jawa',
            'kelas' => 3,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Jawa',
            'kelas' => 4,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Jawa',
            'kelas' => 5,
            'status' => 'non-aktif',
        ]);

        MapelDiampu::create([
            'mapel' => 'Bahasa Jawa',
            'kelas' => 6,
            'status' => 'non-aktif',
        ]);
        // \App\Models\User::factory(10)->create();
    }
}