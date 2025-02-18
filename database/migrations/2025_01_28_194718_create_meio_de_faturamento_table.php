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
        Schema::create('meio_de_faturamento', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID bigint(20) unsigned auto-increment
            $table->enum('meio', ['Plataforma de Pagamento', 'Dinheiro', 'LivCard']); // Enum para meios de faturamento
            $table->timestamps(); // Campos created_at e updated_at padrão do Laravel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meio_de_faturamento');
    }
};
