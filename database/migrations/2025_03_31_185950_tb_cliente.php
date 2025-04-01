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
        Schema::create('tb_cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCliente', length:100);
            $table->string('cpfCliente', length:14);
            $table->date('dataNascimentoCliente');   
            $table->string('logradouroCliente');
            $table->string('numLogradouroCliente');
            $table->string('cepCliente', length: 8);
            $table->string('ufCliente');     
            $table->string('cidadeCliente');         
            $table->string('bairroCliente');         
            $table->string('complementoCliente');         
       
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
        Schema::dropIfExists('tb_cliente');
    }
};

