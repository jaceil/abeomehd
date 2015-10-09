<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('mouse_id')->unsigned();
            $table->foreign('mouse_id')->references('id')->on('mice')->onDelete('cascade');

            $table->string('name');
            $table->string('plate_type');
            $table->text('description');
            $table->boolean('isProcessed');
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
        Schema::drop('plates');
    }
}
