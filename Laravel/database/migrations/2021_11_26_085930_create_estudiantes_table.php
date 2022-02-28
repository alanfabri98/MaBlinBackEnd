<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('n',50)->nullable();
            $table->string('a',50)->nullable();
            $table->string('f',15)->nullable();
            $table->timestamps();
            $table->foreignId('i')
                  ->nullable()
                  ->constrained('users', 'id')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
        });
    }
/*
    $table->foreign('article_id')
                    ->references('id')
                    ->on('articles')
                    ->onCascade('delete');
    nombres: string
    apellidos: string
    fechaNacimiento: string
    idTutor: string
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
