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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id(); // Cria a chave primária ID como bigint(20) UNSIGNED

            $table->unsignedBigInteger('id_user'); // FK para users
            $table->unsignedBigInteger('id_sala'); // FK para salas
            $table->unsignedBigInteger('id_pre_reserva')->nullable(); // FK para pre_reserva (opcional)

            $table->enum('meio_de_pagamento', ['PIX', 'Cartão de Crédito', 'Próxima Fatura']); // Meio de pagamento
            $table->enum('status_pagamento', ['Aprovado', 'Aguardando Pagamento']); // Status do pagamento
            $table->enum('status_reserva', ['Agendado', 'Realizada', 'Cancelado', 'Reagendamento']); // Status da reserva

            $table->timestamps(); // Campos created_at e updated_at padrão do Laravel

            // Definição das chaves estrangeiras
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_sala')->references('id')->on('salas')->onDelete('cascade');
            $table->foreign('id_pre_reserva')->references('id')->on('pre_reserva')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_reserva');
    }
};
