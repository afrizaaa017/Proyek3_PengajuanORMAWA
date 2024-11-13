<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeline extends Model
{
    use HasFactory;
    protected $table = 'timeline';
    protected $fillable = [
    'tanggal_pembukaan',
    'keterangan_pembukaan',
    'tanggal_revisi',
    'keterangan_revisi',
    'tanggal_penutupan ',
    'keterangan_penutupan',
    ];
}
