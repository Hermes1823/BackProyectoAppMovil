<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleGasto extends Model
{
    use HasFactory;
    protected $table = 'detallegastos';
    // public $incrementing = false;
    // protected $primaryKey = null;
    // public $timestamps = false;
    protected $fillable = ['IdTipogasto', 'IdEmpleado', 'Monto', 'Fecha', 'trip_id'];

    public function tipogasto()
    {
        return $this->belongsTo(TipoGasto::class, 'IdTipogasto');
    }

    // public function viaje()
    // {
    //     return $this->belongsTo(Viaje::class, 'IdViaje');
    // }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'IdEmpleado');
    }

    public function trips(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}
