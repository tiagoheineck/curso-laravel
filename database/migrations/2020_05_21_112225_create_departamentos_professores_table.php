<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos_professores', function (Blueprint $table) {
            $table->unsignedBigInteger('departamento_id');            
            $table->unsignedBigInteger('professor_id');            
            
            $table->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->onDelete('cascade');

            $table->foreign('professor_id')
                ->references('id')
                ->on('professores')
                ->onDelete('cascade');

            $table->primary(
                [
                    'departamento_id',
                    'professor_id'
                ]
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos_professores');
    }
}
