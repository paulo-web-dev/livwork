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
        Schema::create('endereco', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID bigint(20) unsigned auto-increment
            $table->unsignedBigInteger('id_cliente'); // FK para tabela clientes
            $table->string('cep', 15)->nullable(); // CEP varchar(15), pode ser nulo
            $table->string('uf', 2)->nullable(); // UF varchar(2), pode ser nulo
            $table->string('cidade', 255)->nullable(); // Cidade varchar(255), pode ser nulo
            $table->string('rua', 255)->nullable(); // Rua varchar(255), pode ser nulo
            $table->string('numero', 5)->nullable(); // Número varchar(5), pode ser nulo
            $table->string('bairro', 255)->nullable(); // Bairro varchar(255), pode ser nulo
            $table->string('complemento', 255)->nullable(); // Complemento varchar(255), pode ser nulo
            $table->string('tipo', 255)->nullable(); // Tipo varchar(255), pode ser nulo
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
        Schema::dropIfExists('endereco');
    }
};
