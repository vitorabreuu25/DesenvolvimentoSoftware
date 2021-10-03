<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('st_nome');
            $table->text('st_descricao');
            $table->text('st_image');
            $table->text('st_categoria');
            $table->date('dt_criacao');
            $table->dateTime('dt_evento');
            $table->float('vl_preco', 8, 2);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
