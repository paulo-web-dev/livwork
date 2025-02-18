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
        Schema::create('pre_reserva', function (Blueprint $table) {
            $table->id(); // Cria a chave primária ID como bigint(20) UNSIGNED
            
            $table->unsignedBigInteger('id_user'); // FK para users
            $table->unsignedBigInteger('id_sala'); // FK para salas

            $table->date('data'); // Campo para a data
            $table->time('hora_inicio'); // Campo para a hora de início
            $table->time('hora_fim'); // Campo para a hora de fim
            $table->float('valor', 8, 2); // Campo para o valor (8 dígitos no total, 2 decimais)

            $table->enum('status', ['Paga', 'Aguardando Pagamento', 'Cancelada']); // Status com ENUM

            $table->timestamps(); // Campos created_at e updated_at padrão do Laravel

            // Definição das chaves estrangeiras
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_sala')->references('id')->on('salas')->onDelete('cascade');
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
