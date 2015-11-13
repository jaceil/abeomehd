<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mice', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('name', 40);
            $table->integer('days');
            $table->string('antigen');
            $table->char('gender');
            $table->string('adjuvant');
            $table->date('injectionDate');
            $table->date('harvestDate')->nullable();
            $table->string('titer')->nullable();
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
        Schema::drop('mice');
    }
}
