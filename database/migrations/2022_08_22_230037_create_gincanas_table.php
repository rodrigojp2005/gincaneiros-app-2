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
        Schema::create('gincanas', function (Blueprint $table) {
            $table->id();
            $table->string('endereco',100)->nullable();
            $table->string('lat',100)->nullable();
            $table->string('lng',100)->nullable();
            //$table->string('resposta',100)->nullable();
            // chave estrangeira do id do usuário em um campo de nome user_id
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('gincanas');
    }
};
