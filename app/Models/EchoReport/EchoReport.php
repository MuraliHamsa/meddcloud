<?php

namespace App\Models\EchoReport;

// use App\Models\Pharmacy\Traits\PharmacyAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EchoReport extends Model {
	// use PharmacyAttribute;

	protected $table = 'echoreport';

	public $timestamps = true;

	use SoftDeletes;

	protected $fillable = ['doctor_id', 'patient_id', 'summary', 'echoreport_date', 'hospital_id'];

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
}