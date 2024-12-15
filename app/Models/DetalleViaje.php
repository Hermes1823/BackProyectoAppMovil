<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleViaje extends Model
{
    use HasFactory;
    protected $table='detalleviajes';
    public $incrementing=false;
    protected $primaryKey=null;
    public $timestamps=false;
    protected $fillable=['IdViaje', 'IdEmpleado','FechaSalida', 'FechaRegreso'];
    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'IdViaje');
    }

    // Relación con Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'IdEmpleado');
    }

}
