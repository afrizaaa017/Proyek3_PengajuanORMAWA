<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BEM_MPM extends Model
{
    protected $table = 'BEM&MPM'; // Nama tabel di database
    protected $primaryKey = 'id_bem&MPM'; // Primary key dari tabel BEM&MPM

    // Relasi Many to One dengan tabel Ormawa
    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'id_ormawa');
    }
}

