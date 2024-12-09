<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros';
    protected $primaryKey = 'idLibro';
    public $timestamps = false;
    protected $fillable = [
        'titulo','editorial','anopublicacion','cantidad', 'estado'
    ]; 
}
