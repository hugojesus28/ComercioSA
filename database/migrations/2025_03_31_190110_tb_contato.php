<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_contato', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCliente');
            $table->string('tipoContato', length: 50);    
            $table->string('valorContato', length: 100);        
            $table->string('observacaoContato');   
            $table->foreign('idCliente')->references('id')->on('tb_cliente');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_contato');
    }
};
