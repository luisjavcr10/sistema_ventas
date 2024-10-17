<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalleventass', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('cabeceraventas', 'venta_id')->onDelete('cascade');
            $table->foreignId('idproducto')->constrained('productos', 'id')->onDelete('cascade');
            $table->decimal('precio', 8, 2);
            $table->integer('cantidad');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalleventass');
    }
};


