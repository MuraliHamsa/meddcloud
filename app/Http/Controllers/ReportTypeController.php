<?php

namespace App\Http\Controllers;

use App\Models\ReportType\ReportType;
use App\Http\Requests\ReportType\StoreReportTypeRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class ReportTypeController
 * @package App\Http\Controllers
 */
class ReportTypeController extends Controller
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
     * Show the ReportType List.
     *
     * @return Response
     */
    public function index()
    {
        return view('report_type.index');
    }

    public function get()
    {
        $report_type = ReportType::select(['id', 'name']);
        return Datatables::of($report_type)
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StoreReportTypeRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;

        if($request->input('id') > 0){
            $report_type = ReportType::findorfail($request->input('id'));
            $report_type->update($input); 
            $msg = 'updated';   
        } else {   
            ReportType::create($input);
            $msg = 'created';
        }

        return redirect()->route('admin.report-type.index')->withFlashSuccess(trans('alerts.backend.report.report-type.'.$msg));
    }

    public function edit($id)
    {
        $report_type = ReportType::findorfail($id);
        return json_encode($report_type);
    }
    
    public function destroy($id)
    {
        $report_type = ReportType::findorfail($id);
        $report_type->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.report.report-type.deleted'));
    }

}

