<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BemMpm extends Model
{
    use HasFactory;

    protected $table = 'bem_mpm';
    protected $primaryKey = 'id_bem_mpm';

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'ormawa_id');
    }
}
