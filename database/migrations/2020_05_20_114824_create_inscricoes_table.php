<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('user_id');
            // $table->date('data_pagamento');
            $table->dateTime('data_pagamento', 0);
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('user_id')->references('id')->on('users');

            // $table->foreignId('curso_id')->constrained('cursos');
            // $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricoes');
    }
}
