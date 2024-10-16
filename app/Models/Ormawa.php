<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;
    protected $table = 'Ormawa';
    protected $fillable = ['id_ormawa','Nama_ormawa'];
}
