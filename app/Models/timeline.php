<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeline extends Model
{
    use HasFactory;

    protected $table = 'timelines';

    protected $fillable = [
        'judul_timeline',
        'keterangan',
        'tanggal_timeline_awal',
        'tanggal_timeline_akhir',
    ];
}

