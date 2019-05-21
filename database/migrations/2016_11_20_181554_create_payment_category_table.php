<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 100);
            $table->text('description');
            $table->float('amount');
            $table->integer('payment_billing_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('payment_billing_id')->references('id')->on('payment_billing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment_category');
    }
}
