<?php

namespace App\Models\PharmacyDrug;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyDrug extends Model {
	// use PaymentCategoryAttribute;

	protected $table = 'pharmacy_drugs';

	public $timestamps = true;

	use SoftDeletes;

	protected $fillable = ['pharmacy_id', 'hospital_id', 'medicine_id', 'quantity', 'medicine_amount'];

	protected $dates = ['deleted_at'];

	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
		$this->table;
	}

	public function hospital() {
		return $this->belongsTo('App\Models\Hospital\Hospital');
	}

	public function pharmacy() {
		return $this->belongsTo('App\Models\Pharmacy\pharmacy');
	}

	public function medicine() {
		return $this->belongsTo('App\Models\Medicine\Medicine');
	}

}
