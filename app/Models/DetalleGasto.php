<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleGasto extends Model
{
    use HasFactory;
    protected $table = 'detallegastos';
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;
    protected $fillable = ['IdTipogasto', 'IdViaje', 'IdEmpleado', 'Monto', 'Fecha'];

    public function tipogasto()
    {
        return $this->belongsTo(TipoGasto::class, 'IdTipogasto');
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'IdViaje');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'IdEmpleado');
    }
}
