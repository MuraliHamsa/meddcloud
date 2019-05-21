<?php

namespace App\Http\Controllers;

use App\Models\Report\Report;
use App\Models\ReportType\ReportType;
use App\Models\Hospital\Hospital;
use App\Models\Patient\Patient;
use App\Models\Doctor\Doctor;
use App\Http\Requests\Report\StoreReportRequest;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
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
     * Show the Report List.
     *
     * @return Response
     */
    public function index()
    {
        $doctors = Doctor::where('hospital_id', $this->hospital->id)->get();
        $patients = Patient::where('hospital_id', $this->hospital->id)->get();
        $report_type = ReportType::where('hospital_id', $this->hospital->id)->get();
        return view('report.index')->with('doctors',$doctors)->with('patients', $patients)->with('report_type', $report_type);
    }

    public function get()
    {
        $report = Report::select(['id', 'report_type_id', 'patient_id', 'doctor_id', 'description', 'add_date' ])->with(['report_type', 'patient', 'doctor']);
        return Datatables::of($report)
            ->addColumn('actions', function ($report) {
                return $report->action_buttons;
            })
            ->editColumn('add_date', function ($report) {
                return with(new Carbon($report->add_date))->format('d-m-Y');
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }


    public function store(StoreReportRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;
        $input['add_date'] = date('Y-m-d', strtotime($input['add_date']));
        
        if($request->input('id') > 0){
            $report = Report::findorfail($request->input('id'));
            $report->update($input);
            $msg = 'updated';
        } else { 
            Report::create($input);
            $msg = 'created';
        }
        
        return redirect()->route('admin.report.index')->withFlashSuccess(trans('alerts.backend.report.report.'.$msg));
    }

    public function edit($id)
    {
        $report = Report::findorfail($id);
        return json_encode($report);
    }

    public function destroy($id)
    {
        $report = Report::findorfail($id);
        $report->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.report.report.deleted'));
    }
   

}