<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('rg')->nullable();
            $table->string('profissao')->nullable();
            $table->string('ramo')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('celular');
            $table->string('telefone')->nullable();
            $table->string('cep')->nullable();
            $table->char('uf', 2)->nullable();
            $table->string('cidade')->nullable();
            $table->string('endereco')->nullable();
            $table->string('email')->unique();
            $table->string('senha');
            $table->foreignId('id_meio_de_faturamento')->nullable()->constrained('meio_de_faturamento')->onDelete('set null');
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
