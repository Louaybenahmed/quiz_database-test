<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Partie', function (Blueprint $table) {
            $table->id();
            $table->integer('levelReached');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('parties');
    }
}
