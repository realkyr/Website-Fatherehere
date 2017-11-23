<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaloriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sex');
            $table->integer('age');
            $table->integer('weight');
            $table->integer('height');
            $table->float('activity');
            $table->double('calories');
            $table->double('bmr');
            $table->integer('breakfast');
            $table->integer('lunch');
            $table->integer('dinner');
            $table->integer('food_cal');
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
        Schema::dropIfExists('calories');
    }
}
