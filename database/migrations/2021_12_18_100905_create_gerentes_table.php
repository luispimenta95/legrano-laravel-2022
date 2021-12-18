<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 40); // Imagem do Produto
            $table->string('email', 100); // Imagem do Produto
            $table->string('cpf', 11)->unique(); // Imagem do Produto
            $table->string('senha', 50); // Imagem do Produto
            $table->string('telefone', 20); // Imagem do Produto
            $table->string('telefone2', 20)->nullable(); // Imagem do Produto
            $table->boolean('ativo')->default(1);
            $table->boolean('administradorMaster')->default(0);
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
        Schema::dropIfExists('gerentes');
    }
}
