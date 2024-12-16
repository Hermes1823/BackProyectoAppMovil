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
            $table->foreignId('IdTipogasto')->constrained('tipogastos','IdTipogasto');
            $table->foreignId('IdViaje')->constrained('viajes','IdViaje');
            $table->foreignId('IdEmpleado')->constrained('empleados','IdEmpleado');
            $table->decimal('Monto', 10, 2);
            $table->date('Fecha');
            $table->timestamps();
    
            // Clave primaria compuesta
            $table->primary(['IdTipogasto', 'IdViaje', 'IdEmpleado']);
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
