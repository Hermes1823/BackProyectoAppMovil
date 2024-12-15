<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    protected $table = 'viajes';
    protected $primaryKey = 'IdViaje';
    public $timestamps = false;
    protected $fillable = ['Destino'];

    public function detalleviajes()
    {
        return $this->hasMany(DetalleViaje::class, 'IdViaje');
    }

    public function detallegastos()
    {
        return $this->hasMany(DetalleGasto::class, 'IdViaje');
    }
}
