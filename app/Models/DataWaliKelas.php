<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWaliKelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'nama');
    }
}