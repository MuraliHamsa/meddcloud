<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 100);
            $table->text('description');
            $table->integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::drop('expense_category');
    }
}
