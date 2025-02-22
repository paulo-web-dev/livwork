<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade', function (Blueprint $table) {
            $table->id(); // Campo id (chave primária)
            $table->string('nome'); // Campo obrigatório
            $table->string('telefone')->nullable(); // Opcional
            $table->string('email'); // Campo obrigatório
            $table->string('rua')->nullable(); // Opcional
            $table->string('numero')->nullable(); // Opcional
            $table->string('bairro')->nullable(); // Opcional
            $table->string('cidade')->nullable(); // Opcional
            $table->char('uf', 2)->nullable(); // Opcional (dois caracteres para o estado)
            $table->string('complemento')->nullable(); // Opcional
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidade');
    }
}
