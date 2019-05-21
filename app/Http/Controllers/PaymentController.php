<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Patient\Patient;
use App\Models\PaymentBillCategory;
use App\Models\PaymentBilling\PaymentBilling;
use App\Models\PaymentCategory\PaymentCategory;
use App\Models\Payment\Payment;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class PaymentController
 * @package App\Http\Controllers
 */

class PaymentController extends Controller {
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
		return view('payment.index');
	}

	public function get() {
		$payment = Payment::select(['id', 'patient_id', 'payment_date', 'amount', 'flat_discount', 'flat_vat', 'gross_total', 'status'])->with('patient');
		return Datatables::of($payment)
			->addColumn('actions', function ($payment) {
				return $payment->action_buttons;
			})
			->editColumn('status', function ($payment) {
				return ($payment->status == 0)?'Un-Paid':'Paid';
			})
			->editColumn('payment_date', function ($payment) {
				return with(new Carbon($payment->payment_date))->format('d-m-Y');
			})

			->editColumn('id', 'ID: {{$id}}')
			->where('hospital_id', $this->hospital->id)
		                                       ->orderBy('id', 'desc')
		                                       ->make(true);
	}

	public function create() {
		$payment_billing  = PaymentBilling::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		$patients         = Patient::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		$payment_category = PaymentCategory::where('hospital_id', $this->hospital->id)->get();
		return view('payment.create')->with(['patients' => $patients, 'payment_billing' => $payment_billing, 'payment_category' => $payment_category]);
	}

	public function getpayment(Request $request) {
		$data = $request->all();
		echo view('payment._payment')->with('data', $data);
	}

	public function getcategory(Request $request) {
		$payment_category = PaymentCategory::select(['id', 'category', 'amount']);
		if ($request->input('id') != '') {
			$payment_category->where('payment_billing_id', $request->input('id'));
		}
		$result = $payment_category->where('hospital_id', $this->hospital->id)->get();
		echo view('payment._category')->with('payment_category', $result);
	}

	public function store(StorePaymentRequest $request, $id = 0) {

		$input    = $request->except(['category_amount', 'category_name', 'category_id']);
		$amount   = array_sum($request->input('category_amount'));
		$settings = Settings::where('hospital_id', $this->hospital->id)->first();
		if ($settings->discount == 'flat') {
			$input['flat_discount'] = $input['discount'];
			$discount_amount        = ($amount-$input['discount']);
		} else {
			$input['flat_discount'] = $amount*($input['discount']/100);
			$discount_amount        = $amount-$amount*($input['discount']/100);
		}
		$input['gross_total']  = $discount_amount+$discount_amount*($input['vat']/100);
		$input['flat_vat']     = $discount_amount*($input['vat']/100);
		$input['payment_date'] = Carbon::now()->format('Y-m-d');
		$input['amount']       = $amount;
		$input['hospital_id']  = $this->hospital->id;

		if ($id > 0) {
			$payment = Payment::findorfail($id);
			$payment->update($input);
			PaymentBillCategory::where('payment_id', $payment->id)->delete();
			$msg = 'updated';
		} else {
			$payment = Payment::create($input);
			$msg     = 'created';
		}

		if ($payment) {
			foreach ($request->input('category_id') as $cid) {
				PaymentBillCategory::create([
						'payment_id'          => $payment->id,
						'payment_category_id' => $cid,
					]);
			}
		}
		return redirect()->route('admin.payment.index')->withFlashSuccess(trans('alerts.backend.financial-activities.payment.'.$msg));
	}

	public function edit($id) {
		$payment = Payment::with(['payment_bill_category' => function ($query) {
					$query->with('payment_category');
				}])->findorfail($id);

		$payment_billing  = PaymentBilling::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		$patients         = Patient::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
		$payment_category = PaymentCategory::where('hospital_id', $this->hospital->id)->get();

		return view('payment.edit')->with(['payment' => $payment, 'patients' => $patients, 'payment_billing' => $payment_billing, 'payment_category' => $payment_category]);
	}

	public function destroy($id) {
		$payment = Payment::findorfail($id);
		$payment->delete();
		return redirect()->back()->withFlashSuccess(trans('alerts.backend.financial-activities.payment.deleted'));
	}

	public function invoice($id) {
		$payment = Payment::with('patient')->with(['payment_bill_category' => function ($query) {
					$query->with('payment_category');
				}])->findorfail($id);
		$settings = Settings::where('hospital_id', $this->hospital->id)->first();
		return view('payment.invoice')->with(['payment' => $payment, 'hospital' => $this->hospital, 'settings' => $settings]);
	}

	public function makePaid($id) {
		Payment::where(['id' => $id, 'status' => 2])->update(['status' => 1]);
		Payment::where(['id' => $id, 'status' => 0])->update(['status' => 2]);

		return redirect()->route('admin.payment.invoice', $id)->withFlashSuccess(trans('alerts.backend.financial-activities.payment.updated'));
	}

}
