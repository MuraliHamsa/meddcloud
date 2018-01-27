<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pharmacy\StorePharmacyRequest;
use App\Models\Doctor\Doctor;
use App\Models\Medicine\Medicine;
use App\Models\Patient\Patient;
use App\Models\PharmacyDrug\PharmacyDrug;
use App\Models\Pharmacy\Pharmacy;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class PharmacyController extends Controller {
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

	/**
	 * Show the Payment List.
	 *
	 * @return Response
	 */
	public function index() {
		return view('pharmacy.index');
	}

	public function get() {
		$pharmacy = Pharmacy::select(['id', 'patient_id', 'amount', 'created_at', 'doctor_id'])->with('patient', 'doctor');
		return Datatables::of($pharmacy)
			->addColumn('actions', function ($pharmacy) {
				return $pharmacy->action_buttons;
			})
			->editColumn('status', function ($pharmacy) {
				return ($pharmacy->status == 0)?'Un-Paid':'Paid';
			})
			->editColumn('payment_date', function ($pharmacy) {
				return with(new Carbon($pharmacy->created_at))->format('d-m-Y');
			})

			->editColumn('id', 'ID: {{$id}}')
			->where('hospital_id', $this->hospital->id)
		                                       ->orderBy('id', 'desc')
		                                       ->make(true);
	}

	public function create() {
		$patients  = Patient::select(['id', 'name', 'doctor_id'])->where('hospital_id', $this->hospital->id)->get();
		$doctors   = Doctor::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		$medicines = Medicine::select(['id', 'name', 'company', 'price', 'quantity', 'company'])->where('hospital_id', $this->hospital->id)->get();
		return view('pharmacy.create')->with(['patients' => $patients, 'medicines' => $medicines, 'doctors' => $doctors]);
	}

	public function getpayment(Request $request) {
		$data = $request->all();
		echo view('pharmacy._payment')->with('data', $data);
	}

	public function store(StorePharmacyRequest $request) {
		$input    = $request;
		$pdocid   = Patient::select(['doctor_id'])->where('id', $input['patient_id'])->get();
		$doctorid = collect($pdocid)->pluck('doctor_id')->first();
		$docid    = Doctor::select('doctor.id')->where('id', $doctorid)->get();
		$getId    = collect($docid)->pluck('id')->first();
		Pharmacy::create([
				'patient_id'  => $input['patient_id'],
				'hospital_id' => $this->hospital->id,
				'amount'      => $input['TextBox3'],
				'doctor_id'   => $getId,
			]);
		$pharmacyid = Pharmacy::all()->last()->id;
		$id         = 0;
		foreach ($request->input('medicine_id') as $medicineid) {
			PharmacyDrug::create([
					'pharmacy_id'     => $pharmacyid,
					'hospital_id'     => $this->hospital->id,
					'medicine_id'     => $medicineid,
					'quantity'        => $request->input('medicine_quantity')[$id],
					'medicine_amount' => $request->input('medicine_amount')[$id],
				]);
			$id = $id+1;
		}
		return redirect()->route('admin.pharmacy.index')->withFlashSuccess('Patient Pharmacy Bill created successfully');
	}

	public function edit($id) {
		$pharmacy = Pharmacy::with('patient', 'doctor')->with(['medicine' => function ($query) {
					$query->with('pharmacy_drugs');
				}])->findorfail($id);

		$medicines = Medicine::select(['id', 'name', 'company', 'price', 'quantity'])->where('hospital_id', $this->hospital->id)->get();
		$patients  = Patient::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		// $payment_category = PaymentCategory::where('hospital_id', $this->hospital->id)->get();

		return view('pharmacy.edit')->with(['pharmacy' => $pharmacy, 'patients' => $patients, 'medicines' => $medicines]);
	}

	public function destroy($id) {
		// $phmdrug = PharmacyDrug::select(['id'])->where('pharmacy_id', $id)->get();
		//       echo $phmdrug
		// foreach ($phmdrug as $d) {
		// 	$d1 = PharmacyDrug::findorfail($d);
		// 	$d1->delete();
		// }

		$pharmacy = Pharmacy::findorfail($id);
		$pharmacy->delete();
		return redirect()->back()->withFlashSuccess(trans('alerts.backend.financial-activities.payment.deleted'));
	}

	public function invoice($id) {
		$pharmacy = Pharmacy::with('patient', 'doctor')->with(['pharmacy_drugs' => function ($query) {
					$query->with('medicine');
				}])->findorfail($id);
		$settings = Settings::where('hospital_id', $this->hospital->id)->first();
		return view('pharmacy.invoice')->with(['hospital' => $this->hospital, 'settings' => $settings, 'pharmacy' => $pharmacy]);
	}
}
