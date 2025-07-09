<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'name',
        'color',
        'description',
    ];
    
    /** Relasi ke tabel tugas*/
    public function tugas()
    {
        return $this->hasMany(\App\Models\Tugas::class);
    }
}
