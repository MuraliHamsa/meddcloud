<?php

namespace App\Http\Controllers;

use App\Models\MedicineCategory\MedicineCategory;
use App\Http\Requests\MedicineCategory\StoreMedicineCategoryRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class MedicineCategoryController
 * @package App\Http\Controllers
 */
class MedicineCategoryController extends Controller
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
        return view('medicine_category.index');
    }

    public function get()
    {
        $medicine_category = MedicineCategory::select(['id', 'name', 'description']);
        return Datatables::of($medicine_category)
            ->addColumn('actions', function ($medicine_category) {
                return $medicine_category->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreMedicineCategoryRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;

        if($request->input('id') > 0){
            $medicinecategory = MedicineCategory::findorfail($request->input('id'));
            $medicinecategory->update($input); 
            $msg = 'updated';   
        } else {   
            MedicineCategory::create($input);
            $msg = 'created';
        }

        return redirect()->route('admin.medicine-category.index')->withFlashSuccess(trans('alerts.backend.medicine.medicine-category.'.$msg));
    }

    public function edit($id)
    {
        $medicine_category = MedicineCategory::findorfail($id);
        return json_encode($medicine_category);
    }
    
    public function destroy($id)
    {
        $medicinecategory = MedicineCategory::findorfail($id);
        $medicinecategory->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.medicine.medicine-category.deleted'));
    }

}

