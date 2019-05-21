<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 250);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->integer('doctor_id')->unsigned();
            $table->integer('ref_doctor_id')->unsigned();
            $table->text('address');
            $table->bigInteger('phone');
            $table->tinyInteger('sex')->comment="1:Male, 2:Female";
            $table->date('birthdate');
            $table->integer('age');
            $table->string('bloodgroup', 100);
            $table->integer('user_id')->unsigned();
            $table->integer('patientId');
            $table->date('add_date');
            $table->integer('hospital_id')->unsigned();
            $table->tinyInteger('visit')->comment = "1:Inpatient, 2:Outpatient, 3:Others";
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('doctor_id')->references('id')->on('doctor');
            $table->foreign('ref_doctor_id')->references('id')->on('doctor');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hospital_id')->references('id')->on('hospital');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient');
    }
}
