<?php

namespace App\Http\Controllers;

use App\Models\PaymentCategory\PaymentCategory;
use App\Models\ExpenseCategory\ExpenseCategory;
use App\Models\Settings;
use App\Models\Payment\Payment;
use App\Models\Expense\Expense;
use Illuminate\Http\Request;
use DB;

/**
 * Class FinancialReportController
 * @package App\Http\Controllers
 */
class FinancialReportController extends Controller
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
     * Show the Financial Report.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input['from_date'] = $input['to_date'] = date('m/d/Y');
        if($request->input('from_date')){
            $input['from_date'] = $request->input('from_date');
        }
        if($request->input('to_date')){
            $input['to_date'] = $request->input('to_date');
        }
        $payment_category = PaymentCategory::where('hospital_id', $this->hospital->id)->get();
        $expense_category = ExpenseCategory::where('hospital_id', $this->hospital->id)->get();
        $settings = Settings::where('hospital_id', $this->hospital->id)->first();
        $payment = Payment::getPayment($this->hospital->id, $input);
        $expense = Expense::getExpense($this->hospital->id, $input); 
        return view('financial_report.index', compact('payment_category', 'expense_category', 'settings', 'payment', 'expense', 'input'));
    }


}

