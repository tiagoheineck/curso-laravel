<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas',function(Blueprint $table) {
            $table->id();
            $table->string('nome',255);
            $table->unsignedBigInteger('professor_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('professor_id')
                ->references('id')
                ->on('professores')
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
        Schema::drop('disciplinas');
    }
}
