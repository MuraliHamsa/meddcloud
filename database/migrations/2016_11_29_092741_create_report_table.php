<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_type_id')->unsigned();
            $table->text('description');
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->date('add_date');
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('doctor_id')->references('id')->on('doctor');
            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('report_type_id')->references('id')->on('report_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report');
    }
}
