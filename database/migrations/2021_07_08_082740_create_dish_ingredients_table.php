<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_ingredient', function (Blueprint $table) {
            $table->bigInteger('dish_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->foreign('dish_id')
                    ->references('id')
                    ->on('dishes')
                    ->onDelete('cascade');
            $table->foreign('ingredient_id')
                    ->references('id')
                    ->on('ingredients')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_ingredients');
    }
}
