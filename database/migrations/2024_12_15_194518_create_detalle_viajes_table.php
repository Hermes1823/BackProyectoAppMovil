<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalleviajes', function (Blueprint $table) {
            $table->foreignId('IdViaje')->constrained('viajes', 'IdViaje');
            $table->foreignId('IdEmpleado')->constrained('empleados', 'IdEmpleado');
            $table->date('FechaSalida');
            $table->date('FechaRegreso');
            $table->timestamps();
    
            // Clave primaria compuesta
            $table->primary(['IdViaje', 'IdEmpleado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_viajes');
    }
};
