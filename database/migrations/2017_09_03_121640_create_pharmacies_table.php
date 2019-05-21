<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->float('amount');
            $table->timestamps();
            $table->softDeletes();
            $table->date('pharmacy_date');

            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('doctor_id')->references('doctor_id')->on('patient');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pharmacies');
    }
}
