<?php

namespace App\Models\Pharmacy;

use App\Models\Pharmacy\Traits\PharmacyAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacy extends Model {
	use PharmacyAttribute;

	protected $table = 'pharmacies';

	public $timestamps = true;

	use SoftDeletes;

	protected $fillable = ['doctor_id', 'patient_id', 'amount', 'pharmacy_date', 'hospital_id'];

	protected $dates = ['deleted_at'];

	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
		$this->table;
	}

	public function patient() {
		return $this->belongsTo('App\Models\Patient\Patient')->withTrashed();
	}

	public function hospital() {
		return $this->belongsTo('App\Models\Hospital\Hospital');
	}

	public function doctor() {
		return $this->belongsTo('App\Models\Doctor\Doctor')->withTrashed();
	}

	public function medicine() {
		return $this->belongsTo('App\Models\Medicine\Medicine')->withTrashed();
	}

	public function pharmacy_drugs() {
		return $this->hasMany('App\Models\PharmacyDrug\PharmacyDrug')->withTrashed();
	}

}