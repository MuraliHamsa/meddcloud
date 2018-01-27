<?php

namespace App\Http\Controllers;

use App\Models\Doctor\Doctor;
use App\Models\Patient\Patient;

class RadiologyReportController extends Controller {
	//

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	protected $hospital;

	public function __construct() {
		$this->middleware('auth');
		$this->hospital = $this->getHospitalId();
	}

	public function create() {
		$patients = Patient::select(['id', 'name', 'doctor_id'])->where('hospital_id', $this->hospital->id)->get();
		$doctors  = Doctor::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		return view('radiologyreport.create')->with(['patients' => $patients, 'doctors' => $doctors]);
	}

}
