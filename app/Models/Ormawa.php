<?php  
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;

    protected $table = 'ormawa';
    protected $primaryKey = 'id_ormawa';

    // public function ukms()
    // {
    //     return $this->hasMany(Ukm::class, 'ormawa_id');
    // }

    // public function himpunans()
    // {
    //     return $this->hasMany(Himpunan::class, 'ormawa_id');
    // }

    // public function bemmpms()
    // {
    //     return $this->hasMany(BemMpm::class, 'ormawa_id');
    // }

    public function prodis()
    {
        return $this->hasMany(ketua_ormawa::class, 'jurusan_id');
    }
}
