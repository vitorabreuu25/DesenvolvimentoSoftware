<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration
{
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('dt_historico');
            $table->text('st_mensagem');
            $table->text('id_usuario');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('historicos');
    }
}
