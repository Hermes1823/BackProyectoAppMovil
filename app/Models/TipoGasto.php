<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoGasto extends Model
{
    use HasFactory;
    protected $table = 'tipogastos';
    protected $primaryKey = 'IdTipogasto';
    public $timestamps = false;
    protected $fillable = ['descripcion'];

    public function detallegastos()
    {
        return $this->hasMany(DetalleGasto::class, 'IdTipogasto');
    }
}
