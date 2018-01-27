<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllotmentBedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allotment_bed', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bed_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->string('allotted_time', 100);
            $table->string('discharge_time', 100);
            $table->tinyInteger('status');
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('bed_id')->references('id')->on('bed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('allotment_bed');
    }
}
