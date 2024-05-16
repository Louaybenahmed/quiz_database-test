<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_shopping', function (Blueprint $table) {
            $table->bigIncrements('shopping_id');
            $table->dateTime('shopping_date');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('character_id');
            
            // Foreign key constraints
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            
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
        Schema::dropIfExists('character_shopping');
    }
}
