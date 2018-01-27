<?php

namespace App\Http\Controllers;

use App\Models\PaymentCategory\PaymentCategory;
use App\Models\PaymentBilling\PaymentBilling;
use App\Http\Requests\PaymentCategory\StorePaymentCategoryRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class PaymentCategoryController
 * @package App\Http\Controllers
 */
class PaymentCategoryController extends Controller
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
     * Show the Payment Category List.
     *
     * @return Response
     */
    public function index()
    {
        $payment_billing = PaymentBilling::where('hospital_id', $this->hospital->id)->get();
        return view('payment_category.index')->with('payment_billing', $payment_billing);
   }

    public function get()
    {
        $hospital = $this->getHospitalId();

        $payment_category = PaymentCategory::select(['id', 'payment_billing_id', 'category', 'amount', 'hospital_id'])->with('payment_billing');
        return Datatables::of($payment_category)
            ->addColumn('actions', function ($payment_category) {
                return $payment_category->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StorePaymentCategoryRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;

        if($request->input('id') > 0){
            $paymentcategory = PaymentCategory::findorfail($request->input('id'));
            $paymentcategory->update($input); 
            $msg = 'updated';   
        } else {   
            PaymentCategory::create($input);
            $msg = 'created';
        }

        return redirect()->route('admin.payment-category.index')->withFlashSuccess(trans('alerts.backend.financial-activities.payment-category.'.$msg));
    }

    public function edit($id)
    {
        $paymentcategory = PaymentCategory::findorfail($id);
        return json_encode($paymentcategory);
    }
    
    public function destroy($id)
    {
        $paymentcategory = PaymentCategory::findorfail($id);
        $paymentcategory->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.financial-activities.payment-category.deleted'));
    }

}

