<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logeo extends Model
{
    use HasFactory;
    protected $table = 'Usuarios';
    protected $primaryKey = 'IdUsuario';
    public $timestamps = false;
    protected $fillable = [
        'Email',
        'Contraseña',
        'IdRol',
        'FechaRegistro'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'IdRol');
    }
}
