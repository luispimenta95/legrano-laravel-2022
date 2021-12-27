<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeProduto');
            $table->string('unidade');
            $table->integer('estoque')->default(0);
            $table->float('precoDelivery', 8, 2);
            $table->float('precoAtacado', 8, 2);
            $table->integer('codigo');
            $table->boolean('ativo')->default(1);
            $table->string('imagem', 100); // Imagem do Produto
            $table->integer('id_categoria')->unsigned(); // Id da tabela categories
            $table->foreign('id_categoria')->references('id')->on('categorias'); // Define o campo como chave extrangeira (foreign key)
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
        Schema::dropIfExists('produtos');
    }
}
