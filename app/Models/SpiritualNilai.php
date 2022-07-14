<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpiritualNilai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'taat_beribadah', 'syukur', 'beroda', 'toleransi', 'deskripsi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function data_diri()
    {
        return $this->belongsTo(DataDiri::class, 'nis', 'nis');
    }
}