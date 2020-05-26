<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos',function(Blueprint $table) {
            $table->id();
            $table->string('nome',255);
            $table->unsignedBigInteger('cidade_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('cidade_id')
                ->references('id')
                ->on('cidades')
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
        Schema::drop('cursos');
    }
}
