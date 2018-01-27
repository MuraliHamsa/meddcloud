<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePharmacyDrugsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pharmacy_drugs', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('pharmacy_id')->unsigned();
				$table->integer('hospital_id')->unsigned();
				$table->integer('medicine_id')->unsigned();
				$table->float('quantity');
				$table->float('medicine_amount');
				$table->timestamps();
				$table->softDeletes();

				$table->foreign('hospital_id')->references('id')->on('hospital');
				$table->foreign('pharmacy_id')->references('id')->on('pharmacies');
				$table->foreign('medicine_id')->references('id')->on('medicine');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('pharmacy_drugs');
	}
}
