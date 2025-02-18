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
        Schema::create('informacoes_complementares', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('foto', 255); 
            $table->date('nascimento_fundacao');
            $table->string('inscricao_municipal', 255)->nullable();
            $table->string('inscricao_estadual', 255)->nullable(); 
            $table->string('ramo', 255)->nullable(); 
            $table->string('obs', 1255)->nullable();
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
        Schema::dropIfExists('informacoes_complementares');
    }
};
