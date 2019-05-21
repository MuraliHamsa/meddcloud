<?php

namespace App\Http\Controllers;

use App\Models\PaymentBilling\PaymentBilling;
use App\Http\Requests\PaymentBilling\StorePaymentBillingRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class PaymentBillingController
 * @package App\Http\Controllers
 */
class PaymentBillingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $hospital;

    public function __construct()
    {
        $this->middleware('auth');
        $this->hospital = $this->getHospitalId();
    }

    /**
     * Show the Payment Type List.
     *
     * @return Response
     */
    public function index()
    {
        return view('payment_billing.index');
    }

    public function get()
    {
        $payment_billing = PaymentBilling::select(['id', 'name']);
        return Datatables::of($payment_billing)
            /*->addColumn('actions', function ($payment_billing) {
                return $payment_billing->action_buttons;
            })*/
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StorePaymentBillingRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;

        if($request->input('id') > 0){
            $payment_billing = PaymentBilling::findorfail($request->input('id'));
            $payment_billing->update($input); 
            $msg = 'updated';   
        } else {   
            PaymentBilling::create($input);
            $msg = 'created';
        }

        return redirect()->route('admin.payment-billing.index')->withFlashSuccess(trans('alerts.backend.financial-activities.payment-billing.'.$msg));
    }

    public function edit($id)
    {
        $payment_billing = PaymentBilling::findorfail($id);
        return json_encode($payment_billing);
    }
    
    public function destroy($id)
    {
        $payment_billing = PaymentBilling::findorfail($id);
        $payment_billing->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.financial-activities.payment-billing.deleted'));
    }

}

