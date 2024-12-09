<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table='clientes';
    protected $primaryKey='idcliente';
    public $timestamps=false;
    protected $fillable=['dni','nombres','email','direccion'];


}
