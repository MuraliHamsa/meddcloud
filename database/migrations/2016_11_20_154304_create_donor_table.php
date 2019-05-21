<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('blood_bank_id')->unsigned();
            $table->integer('age');
            $table->tinyInteger('sex')->comment="1:Male, 2:Female";
            $table->date('last_donation');
            $table->bigInteger('phone');
            $table->string('email', 100);
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('blood_bank_id')->references('id')->on('blood_bank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donor');
    }
}
