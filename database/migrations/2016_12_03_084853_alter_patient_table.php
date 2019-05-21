<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient', function ($table) {
            $table->integer('blood_bank_id')->unsigned()->default(1);
            $table->dropColumn('bloodgroup');

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
        Schema::drop('patient');

    }
}
