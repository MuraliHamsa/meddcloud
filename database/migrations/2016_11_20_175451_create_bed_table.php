<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bed_category_id')->unsigned();
            $table->integer('number');
            $table->text('description');
            $table->string('last_allotted_time', 100);
            $table->string('last_discharge_time', 100);
            $table->string('bedId', 100);
            $table->tinyInteger('status');
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('bed_category_id')->references('id')->on('bed_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bed');
    }
}
