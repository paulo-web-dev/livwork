<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_salas', function (Blueprint $table) {
            $table->id(); // Campo id (chave primária)
            $table->string('path'); // Caminho do arquivo da foto
            $table->unsignedBigInteger('id_sala'); // Chave estrangeira para a tabela sala
            $table->timestamps(); // Campos created_at e updated_at

            // Definição da chave estrangeira
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
        Schema::dropIfExists('fotos_salas');
    }
}
