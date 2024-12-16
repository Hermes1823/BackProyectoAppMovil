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
        Schema::create('detallegastos', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('IdTipogasto')->constrained('tipogastos','IdTipogasto');
            // $table->foreignId('IdViaje')->constrained('viajes','IdViaje');
            // $table->foreignId('IdEmpleado')->constrained('empleados','IdEmpleado');
            $table->decimal('Monto', 10, 2);
            $table->date('Fecha');
            $table->timestamps();

            $table->unsignedBigInteger('IdTipogasto');
            $table->foreign('IdTipogasto')->references('IdTipoGasto')->on('tipogastos');
            // $table->unsignedBigInteger('IdViaje');
            // $table->foreign('IdViaje')->references('IdViaje')->on('viajes');
            $table->unsignedBigInteger('IdEmpleado');
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('empleados');

            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips');
    
            // Clave primaria compuesta
            // $table->primary(['IdTipogasto', 'IdViaje', 'IdEmpleado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_gastos');
    }
};
