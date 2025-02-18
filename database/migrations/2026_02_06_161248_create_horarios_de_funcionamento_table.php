<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('horarios_de_funcionamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sala');
            $table->time('inicio_padrao')->nullable();
            $table->time('fim_padrao')->nullable();
            $table->time('inicio_almoco')->nullable();
            $table->time('fim_almoco')->nullable();
            $table->time('inicio_sabado')->nullable();
            $table->time('fim_sabado')->nullable();
            $table->time('inicio_domingo')->nullable();
            $table->time('fim_domingo')->nullable();
            $table->timestamps();

            $table->foreign('id_sala')->references('id')->on('salas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios_de_funcionamento');
    }
};
