<?php

namespace App\Models;

use App\Enums\PengajuanStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans';
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'prodi',
        'ormawa',
        'ketua_ormawa',
        'periode',
        'telp',
        'email',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'status' => PengajuanStatus::class,
    ];

    public function berkas(): HasOne
    {
        return $this->hasOne(Berkas::class);
    }
}
