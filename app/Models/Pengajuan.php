<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;


    // Specify the table if it's not the plural form of the model name
    protected $table = 'pengajuans';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'prodi',
        'ormawa',
        'ketua_ormawa', // Make sure this is included
        'periode',
        'telp',
        'email',
    ];

    // Optionally, you can define relationships here
}
=======
>>>>>>> 6b395d8a227484eacb791a0353d7d4335e3a92c4

    protected $fillable = ['nama', 'nim', 'jurusan', 'prodi', 'ormawa', 'periode', 'telp', 'email'];
}
