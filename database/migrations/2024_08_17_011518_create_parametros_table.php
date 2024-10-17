<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->id('tipo_id');
            $table->string('numeracion');
            $table->string('serie');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parametros');
    }
};

