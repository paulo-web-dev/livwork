<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations .
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id(); // Campo id (chave primária)
            $table->string('nome'); // Campo obrigatório
            $table->decimal('valor', 10, 2); // Campo obrigatório (valor decimal)
            $table->unsignedBigInteger('id_unidade'); // Chave estrangeira para a tabela unidade
            $table->timestamps(); // Campos created_at e updated_at

            // Definição da chave estrangeira
            $table->foreign('id_unidade')->references('id')->on('unidade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sala');
    }
}
