<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetalleViaje extends Model
{
    use HasFactory;
    protected $table='detalleviajes';
    // public $incrementing=false;
    // protected $primaryKey=null;
    // public $timestamps=false;
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

    public function detallegastos(): HasMany
    {
        return this->hasMany(DetalleGasto::class);
    }
}
