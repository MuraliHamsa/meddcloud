<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 250);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->text('address');
            $table->bigInteger('phone');
            $table->integer('department_id')->unsigned();
            $table->string('profile', 100);
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('department');
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
        Schema::drop('doctor');
    }
}
