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
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID bigint(20) unsigned auto-increment
            $table->unsignedBigInteger('id_cliente'); // FK para tabela clientes
            $table->string('celular', 15); // Celular varchar(15)
            $table->string('telefone', 15)->nullable(); // Telefone varchar(15), pode ser nulo
            $table->timestamps(); // Campos created_at e updated_at padrão do Laravel

            // Relacionamento
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
};
