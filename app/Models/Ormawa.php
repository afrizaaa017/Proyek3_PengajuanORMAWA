<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Jika Anda menggunakan factories
use Illuminate\Support\Str; // Untuk UUID

class Ormawa extends Model
{
    use HasFactory; // Gunakan trait ini jika Anda ingin menggunakan factories

    protected $table = 'Ormawa'; // Nama tabel di database
    protected $primaryKey = 'id_ormawa'; // Primary key dari tabel Ormawa
    public $incrementing = false; // Non-incrementing untuk UUID
    protected $keyType = 'string'; // Tipe kunci sebagai string untuk UUID

    // Relasi One to Many dengan tabel UKM
    public function ukms()
    {
        return $this->hasMany(UKM::class, 'id_ormawa');
    }

    // Relasi One to Many dengan tabel BEM&MPM
    public function bems()
    {
        return $this->hasMany(BEM_MPM::class, 'id_ormawa');
    }

    // Relasi One to Many dengan tabel Himpunan
    public function himpunans()
    {
        return $this->hasMany(Himpunan::class, 'id_ormawa');
    }
}
