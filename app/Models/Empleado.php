<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = 'IdEmpleado';
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Telefono', 'Cargo'];

    public function detalleviajes()
    {
        return $this->hasMany(DetalleViaje::class, 'IdEmpleado');
    }

    public function detallegastos()
    {
        return $this->hasMany(DetalleGasto::class, 'IdEmpleado');
    }
}
