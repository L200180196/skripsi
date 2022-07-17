<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'level',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function DataDiri()
    {
        return $this->hasOne(DataDiri::class, 'nis', 'nomor_induk');
    }

    public function DataGuru()
    {
        return $this->hasOne(DataGuru::class, 'nip', 'nomor_induk');
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