<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevenFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seven_foods', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('name');
          $table->double('protein');
          $table->double('carbo');
          $table->double('fat');
          $table->integer('kcal');
          $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seven_foods');
    }
}
