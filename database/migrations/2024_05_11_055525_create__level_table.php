<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Level', function (Blueprint $table) {
            $table->id();
            $table->integer('levelNumber')->unique();
            $table->string('difficulty');
            $table->string('description');
            $table->timestamps();
        });

        // Create the pivot table for the many-to-many relationship between levels and categories
        Schema::create('level_categorie', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('categorie_id');

            // Define foreign key constraints
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            // Define a composite primary key
            $table->primary(['level_id', 'categorie_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the pivot table first
        Schema::dropIfExists('level_categorie');

        // Then drop the levels table
        Schema::dropIfExists('levels');
    }
}
