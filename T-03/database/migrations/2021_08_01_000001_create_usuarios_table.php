<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('st_token');
            $table->text('st_nome');
            $table->string('st_rg', 9)->unique();
            $table->string('st_senha');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
