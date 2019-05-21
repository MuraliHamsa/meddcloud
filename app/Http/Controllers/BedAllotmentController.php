<?php

namespace App\Http\Controllers;

use App\Models\BedAllotment\BedAllotment;
use App\Models\Bed\Bed;
use App\Models\Patient\Patient;
use App\Http\Requests\BedAllotment\StoreBedAllotmentRequest;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;

/**
 * Class BedAllotmentController
 * @package App\Http\Controllers
 */
class BedAllotmentController extends Controller
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
     * Show the BedAllotment List.
     *
     * @return Response
     */
    public function index()
    {
        $beds = Bed::where('hospital_id', $this->hospital->id)->get();
        $patients = Patient::where('hospital_id', $this->hospital->id)->get();
        return view('bed_allotment.index')->with(['beds' => $beds, 'patients' => $patients]);
    }

    public function get()
    {
        $bedallotment = BedAllotment::select(['id', 'bed_id', 'patient_id', 'allotted_time', 'discharge_time', 'status', 'hospital_id'])->with('bed')->with('patient');
        return Datatables::of($bedallotment)
            ->addColumn('actions', function ($bedallotment) {
                return $bedallotment->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreBedAllotmentRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;
        
        if($request->input('id') > 0){
            $bedallotment = BedAllotment::findorfail($request->input('id'));
            $bedallotment->update($input);
            $msg = 'updated';
        } else {
            BedAllotment::create($input);
            $msg = 'created';
        }

        $bed = Bed::findorfail($request->input('bed_id'));
        $bed->last_allotted_time = $request->input('allotted_time');
        $bed->last_discharge_time = $request->input('discharge_time');
        if(empty($request->input('discharge_time')) || (date('d/m/Y H:i A') < $request->input('discharge_time'))){
            $bed->status = 2;
        }
        if(date('d/m/Y H:i A') > $request->input('discharge_time')){
            $bed->status = 1;
        }
        $bed->save();

        return redirect()->route('admin.bed-allotment.index')->withFlashSuccess(trans('alerts.backend.bed.bed-allotment.'.$msg));
    }

    public function edit($id)
    {
        $bedallotment = BedAllotment::findorfail($id);
        return json_encode($bedallotment);
    }

    public function destroy($id)
    {
        $bedallotment = BedAllotment::findorfail($id);
        $bedallotment->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.bed.bed-allotment.deleted'));
    }

}

