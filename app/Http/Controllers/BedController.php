<?php

namespace App\Http\Controllers;

use App\Models\Bed\Bed;
use App\Models\BedCategory\BedCategory;
use App\Http\Requests\Bed\StoreBedRequest;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;

/**
 * Class BedController
 * @package App\Http\Controllers
 */
class BedController extends Controller
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
     * Show the Bed List.
     *
     * @return Response
     */
    public function index()
    {
        $bed_category = BedCategory::where('hospital_id', $this->hospital->id)->get();
        return view('bed.index')->with('bed_category', $bed_category);
    }

    public function get()
    {
        $bed = Bed::select(['id', 'bed_category_id', 'number', 'bedId', 'description', 'status'])->with('bed_category');
        return Datatables::of($bed)
            ->addColumn('actions', function ($bed) {
                return $bed->action_buttons;
            })
            ->editColumn('status', function ($bed) {
                return ($bed->status == 2) ? 'Alloted' : 'Available';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreBedRequest $request)
    {
        $bed_category = BedCategory::findorfail($request->input('bed_category_id'));

        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;
        $input['bedId'] = $bed_category->category.'-'.$request->input('number');
        $input['status'] = 1;
        
        if($request->input('id') > 0){
            $bed = Bed::findorfail($request->input('id'));
            $bed->update($input);
            $msg = 'updated';
        } else {
            Bed::create($input);
            $msg = 'created';
        }
        
        return redirect()->route('admin.bed.index')->withFlashSuccess(trans('alerts.backend.bed.bed.'.$msg));
    }

    public function edit($id)
    {
        $bed = Bed::findorfail($id);
        return json_encode($bed);
    }

    public function destroy($id)
    {
        $bed = Bed::findorfail($id);
        $bed->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.bed.bed.deleted'));
    }

}

