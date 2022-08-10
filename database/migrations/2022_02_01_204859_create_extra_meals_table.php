<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_meals', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('meal_id');
           $table->string('name_ar');
           $table->string('name_en');
           $table->double('price');
           $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_meals');
    }
}
