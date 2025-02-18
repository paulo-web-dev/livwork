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
        Schema::create('origem', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID bigint(20) unsigned auto-increment
            $table->string('origem', 255); // Campo origem varchar(255)
            $table->enum('status', ['Habilitado', 'Desabilitado']); // Enum status
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
        Schema::dropIfExists('origem');
    }
};
