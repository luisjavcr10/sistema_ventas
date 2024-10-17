<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->id('tipo_id');
            $table->string('descripcion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo');
    }
};


