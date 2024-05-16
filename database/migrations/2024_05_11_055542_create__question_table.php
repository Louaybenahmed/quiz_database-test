<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Question', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->string('correct_answer');
            $table->integer('gold_question');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
