<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->date('payment_date');
            $table->float('amount');
            $table->float('vat');
            $table->float('flat_vat');
            $table->float('discount');
            $table->float('flat_discount');
            $table->float('gross_total');
            $table->string('category_name', 255);
            $table->tinyInteger('status')->comment="0: Un-paid, 1: Paid, 2: Paid-last";
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patient');
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
        Schema::drop('payment');
    }
}
