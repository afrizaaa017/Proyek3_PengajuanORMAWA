<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Himpunan extends Model
{
    protected $table = 'Himpunan'; // Nama tabel di database
    protected $primaryKey = 'id_himpunan'; // Primary key dari tabel Himpunan

    // Relasi Many to One dengan tabel Ormawa
    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'id_ormawa');
    }
}

