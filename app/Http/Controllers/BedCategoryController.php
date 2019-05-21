<?php

namespace App\Http\Controllers;

use App\Models\BedCategory\BedCategory;
use App\Http\Requests\BedCategory\StoreBedCategoryRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class BedCategoryController
 * @package App\Http\Controllers
 */
class BedCategoryController extends Controller
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
        return view('bed_category.index');
    }

    public function get()
    {
        $bed_category = BedCategory::select(['id', 'category', 'description']);
        return Datatables::of($bed_category)
            ->addColumn('actions', function ($bed_category) {
                return $bed_category->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StoreBedCategoryRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;

        if($request->input('id') > 0){
            $bedcategory = BedCategory::findorfail($request->input('id'));
            $bedcategory->update($input); 
            $msg = 'updated';   
        } else {   
            BedCategory::create($input);
            $msg = 'created';
        }

        return redirect()->route('admin.bed-category.index')->withFlashSuccess(trans('alerts.backend.bed.bed-category.'.$msg));
    }

    public function edit($id)
    {
        $bed_category = BedCategory::findorfail($id);
        return json_encode($bed_category);
    }
    
    public function destroy($id)
    {
        $bedcategory = BedCategory::findorfail($id);
        $bedcategory->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.bed.bed-category.deleted'));
    }

}

