<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropostaTccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposta_tccs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150);
            $table->string('orientador', 150);
            $table->string('titulo', 150);
            $table->string('subtitulo', 150);
            $table->string('local', 150);
            $table->date('ano');
            $table->text('finalidade');
            $table->text('objetivos');
            $table->text('problematizacao');
            $table->text('delimitacao');
            $table->text('objetivo_geral');
            $table->text('objetivo_especifico');
            $table->text('justificativa');
            $table->string('usuario', 30)->unique();
            $table->string('status', 15)->default('revisar');
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
        Schema::drop('proposta_tccs');
    }
}
