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
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID bigint(20) unsigned auto-increment
            $table->unsignedBigInteger('id_cliente'); // FK para tabela clientes
            $table->string('tipo', 255)->nullable(); // Tipo varchar(255), pode ser nulo
            $table->string('email', 255); // Email varchar(255)
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
        Schema::dropIfExists('emails');
    }
};
