<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->float('score');
            $table->enum('abuse',['0','1'])->default(0);
            $table->date('date');
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
        Schema::dropIfExists('mark_quizzes');
    }
}
