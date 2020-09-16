<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarequizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carequizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quizname')->nullable();
            $table->string('question')->nullable();
            $table->string('answer_a')->nullable();
            $table->string('answer_b')->nullable();
            $table->string('answer_c')->nullable();
            $table->string('answer_d')->nullable();
            $table->string('correct_answer')->nullable();
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
        Schema::dropIfExists('carequizzes');
    }
}
