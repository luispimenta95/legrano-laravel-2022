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
            $table->increments('id');
            $table->string('nome', 40); // Imagem do Produto
            $table->string('email', 100); // Imagem do Produto
            $table->string('cpfCnpj', 14)->unique(); // Imagem do Produto
            $table->string('senha', 50); // Imagem do Produto
            $table->string('telefone', 20); // Imagem do Produto
            $table->string('telefone2', 20)->nullable(); // Imagem do Produto
            $table->boolean('ativo')->default(1);
            $table->boolean('primeiroAcesso')->default(1);
            $table->string('endereco', 200); // Imagem do Produto
            $table->integer('cidade')->unsigned();
            $table->foreign('cidade')->references('id')->on('cidades');
            $table->integer('tipo')->unsigned();
            $table->foreign('tipo')->references('id')->on('tipo_clientes');


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
        Schema::dropIfExists('clientes');
    }
}
