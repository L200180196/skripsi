<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap','no_telp','alamat','nis','kelas'];
    
    public function User()
    {
        return $this->belongsTo(User::class, 'nomor_induk', 'nis');
    }

    public function SpiritualNilai()
    {
        return $this->hasOne(SpiritualNilai::class, 'foreign_key');
    }

    public function SosialNilai()
    {
        return $this->hasOne(SpiritualNilai::class, 'foreign_key');
    }

    public function PengetahuanNilai()
    {
        return $this->hasOne(PengetahuanNilai::class, 'foreign_key');
    }

    public function KeterampilanNilai()
    {
        return $this->hasOne(KeterampilanNilai::class, 'foreign_key');
    }
}