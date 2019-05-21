<?php

namespace App\Http\Controllers;

use App\Http\Requests\EchoReport\StoreEchoReportRequest;
use App\Models\Doctor\Doctor;
use App\Models\EchoReport\EchoReport;
use App\Models\Patient\Patient;

class EchoReportController extends Controller {
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
		return view('echoreport.create')->with(['patients' => $patients, 'doctors' => $doctors]);
	}

	public function store(StoreEchoReportRequest $request) {
		$input   = $request;
		$pdoc_id = Patient::where('id', $input['patient'])->value('doctor_id');
		EchoReport::create([
				'patient_id'  => $input['patient'],
				'hospital_id' => $this->hospital->id,
				'summary'     => $input['description'],
				'doctor_id'   => $pdoc_id,
			]);
		return redirect()->route('admin.echoreport.create')->withFlashSuccess('Patient Pharmacy Bill created successfully');
	}
}
