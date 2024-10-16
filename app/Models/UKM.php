<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UKM extends Model
{
    protected $table = 'UKM'; // Nama tabel di database
    protected $primaryKey = 'id_ukm'; // Primary key dari tabel UKM

    // Relasi Many to One dengan tabel Ormawa
    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'id_ormawa');
    }
}
