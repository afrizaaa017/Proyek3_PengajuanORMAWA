<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ketua_ormawa extends Model // Perbaiki nama kelas menjadi PascalCase
{
    use HasFactory;

    protected $table = 'ketua_ormawa';
    protected $primaryKey = 'id_ketua_ormawa';
    protected $fillable = ['nama_ketua', 'id_ormawa'];

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'id_ormawa');
    }
}
