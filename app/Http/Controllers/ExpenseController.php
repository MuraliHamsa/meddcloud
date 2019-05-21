<?php

namespace App\Http\Controllers;

use App\Models\Expense\Expense;
use App\Models\ExpenseCategory\ExpenseCategory;
use App\Http\Requests\Expense\StoreExpenseRequest;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;

/**
 * Class ExpenseController
 * @package App\Http\Controllers
 */
class ExpenseController extends Controller
{
    protected $hospital;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->hospital = $this->getHospitalId();
    }

    /**
     * Show the Expense List.
     *
     * @return Response
     */
    public function index()
    {
        $expense_category = ExpenseCategory::where('hospital_id', $this->hospital->id)->get();
        return view('expense.index')->with('expense_category', $expense_category);
    }

    public function get()
    {
        $expense = Expense::select(['id', 'expense_category_id', 'created_at', 'amount'])->with('expense_category');
        return Datatables::of($expense)
            ->addColumn('actions', function ($expense) {
                return $expense->action_buttons;
            })
            ->editColumn('created_at', function ($expense) {
                return with(new Carbon($expense->created_at))->format('d-m-Y');
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense_category = ExpenseCategory::findorfail($request->input('expense_category_id'));

        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;
              
        if($request->input('id') > 0){
            $expense = Expense::findorfail($request->input('id'));
            $expense->update($input);
            $msg = 'updated';
        } else {
            Expense::create($input);
            $msg = 'created';
        }
        
        return redirect()->route('admin.expense.index')->withFlashSuccess(trans('alerts.backend.financial-activities.expense.'.$msg));
    }

    public function edit($id)
    {
        $expense = Expense::findorfail($id);
        return json_encode($expense);
    }

    public function destroy($id)
    {
        $expense = Expense::findorfail($id);
        $expense->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.financial-activities.expense.deleted'));
    }

}

