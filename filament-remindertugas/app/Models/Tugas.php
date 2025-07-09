<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tugas extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline', // Ganti dari batas_pengumpulan
        'ingatkan_pada', // Tambahkan ini juga
        'user_id',
        'mata_kuliah_id',
        'status',
        'kategori_id',
    ];


    /** Relasi ke tabel users*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**Relasi ke tabel mata_kuliah*/
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    /**Relasi ke tabel kategori*/
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }



}
