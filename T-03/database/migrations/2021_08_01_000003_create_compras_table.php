<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_evento')->unsigned();
            $table->foreign('id_evento')->references('id')->on('eventos')->onDelete('cascade');
            $table->text('st_rg');
            $table->dateTime('dt_compra');
            $table->float('vl_preco', 8, 2);
            $table->dateTime('dt_estorno')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
