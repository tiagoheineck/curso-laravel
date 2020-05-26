<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudos', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->text('conteudo');
            $table->unsignedBigInteger('disciplina_id');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('disciplina_id')
                ->references('id')
                ->on('disciplinas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteudos');
    }
}
