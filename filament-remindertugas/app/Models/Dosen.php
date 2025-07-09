<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'gender',
        'alamat_rumah'
    ];

    /**
     * Relasi ke tabel mata_kuliah
     */
    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
