<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEchoReportTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('echoreport', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('doctor_id')->unsigned();
				$table->integer('patient_id')->unsigned();
				$table->integer('hospital_id')->unsigned();
				$table->text('summary');
				$table->timestamps();
				$table->softDeletes();
				$table->date('echoreport_date');

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
	public function down() {
		Schema::drop('echoreport');
	}
}
