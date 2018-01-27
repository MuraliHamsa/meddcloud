<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('medicine_category_id')->unsigned();
            $table->float('price');
            $table->integer('quantity');
            $table->string('generic', 100);
            $table->string('company', 100);
            $table->string('effects', 100);
            $table->date('expiry_date');
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('medicine_category_id')->references('id')->on('medicine_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicine');
    }
}
