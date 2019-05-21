<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory\ExpenseCategory;
use App\Http\Requests\ExpenseCategory\StoreExpenseCategoryRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class ExpenseCategoryController
 * @package App\Http\Controllers
 */
class ExpenseCategoryController extends Controller
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
     * Show the Nurse List.
     *
     * @return Response
     */
    public function index()
    {
        return view('expense_category.index');
    }

    public function get()
    {
        $expense_category = ExpenseCategory::select(['id', 'category', 'description']);
        return Datatables::of($expense_category)
            ->addColumn('actions', function ($expense_category) {
                return $expense_category->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StoreExpenseCategoryRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;

        if($request->input('id') > 0){
            $expense_category = ExpenseCategory::findorfail($request->input('id'));
            $expense_category->update($input); 
            $msg = 'updated';   
        } else {   
            ExpenseCategory::create($input);
            $msg = 'created';
        }

        return redirect()->route('admin.expense-category.index')->withFlashSuccess(trans('alerts.backend.financial-activities.expense-category.'.$msg));
    }

    public function edit($id)
    {
        $expense_category = ExpenseCategory::findorfail($id);
        return json_encode($expense_category);
    }
    
    public function destroy($id)
    {
        $expense_category = ExpenseCategory::findorfail($id);
        $expense_category->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.financial-activities.expense-category.deleted'));
    }

}

