<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'nama',
        'kode',
        'sks',
        'deskripsi',
        'dosen_id', // Fitur 1: Tambahkan dosen_id
    ];

    /** Relasi ke tabel tugas*/
    public function tugas()
    {
        return $this->hasMany(\App\Models\Tugas::class);
    }

    /**Relasi ke tabel dosen */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }


}
