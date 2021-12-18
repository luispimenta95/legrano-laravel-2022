<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codPedido', 10);
            $table->integer('quantidade');
            $table->float('precoPedido', 8, 2);
            $table->float('precoFrete', 8, 2);
            $table->integer('id_produto')->unsigned(); // Id da tabela categories
            $table->foreign('id_produto')->references('id')->on('produtos'); // Define o campo como chave extrangeira (foreign key)
            $table->integer('id_cliente')->unsigned(); // Id da tabela categories
            $table->foreign('id_cliente')->references('id')->on('clientes'); // Define o campo como chave extrangeira (foreign key)
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
        Schema::dropIfExists('pedidos');
    }
}
