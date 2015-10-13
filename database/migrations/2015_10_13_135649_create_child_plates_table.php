<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildPlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childPlates', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('plate_type');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('childPlate_plate', function (Blueprint $table) {
            $table->integer('plate_id')->unsigned()->index();
            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');

            $table->integer('child_plate_id')->unsigned()->index();
            $table->foreign('child_plate_id')->references('id')->on('childPlates')->onDelete('cascade');

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
        Schema::drop('childPlates');
        Schema::drop('childPlate_bplate');
    }
}
