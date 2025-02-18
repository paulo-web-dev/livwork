<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('configuracoes_sala', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sala');
            $table->string('cor', 8)->nullable();
            $table->integer('quantidade_max_pessoas')->nullable();
            $table->enum('agendamento_fracionado', ['Habilitado', 'Desabilitado'])->nullable();
            $table->enum('agendamento_apenas_diaria', ['Habilitado', 'Desabilitado'])->nullable();
            $table->enum('vizualizacao_cliente', ['Habilitado', 'Desabilitado'])->nullable();
            $table->timestamps();

            $table->foreign('id_sala')->references('id')->on('salas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuracoes_sala');
    }
};
