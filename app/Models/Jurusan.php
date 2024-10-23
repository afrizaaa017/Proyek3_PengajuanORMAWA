<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans'; // Menggunakan huruf kecil
    protected $primaryKey = 'id_jurusan';
    protected $fillable = ['nama_jurusan'];

    public function prodis()
    {
        return $this->hasMany(Prodi::class, 'jurusan_id');
    }
}

