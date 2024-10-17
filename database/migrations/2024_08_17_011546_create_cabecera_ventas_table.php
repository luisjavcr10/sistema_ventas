<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cabeceraventas', function (Blueprint $table) {
            $table->id('venta_id');
            $table->unsignedBigInteger('cliente_id');
            $table->string('nrodoc');  // Añadir esta línea si la columna 'nrodoc' no existe
            $table->unsignedBigInteger('tipo_id');
            $table->date('fecha_venta');
            $table->decimal('total', 8, 2);
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('igv', 8, 2)->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps(); 
            // Relaciones
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('tipo_id')->references('tipo_id')->on('tipo')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabeceraventas');
    }
};




