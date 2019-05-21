<?php

namespace App\Http\Controllers;

use App\Models\Department\Department;
use App\Models\Hospital\Hospital;
use App\Http\Requests\Department\StoreDepartmentRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class DepartmentController
 * @package App\Http\Controllers
 */
class DepartmentController extends Controller
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
     * Show the Department List.
     *
     * @return Response
     */
    public function index()
    {
        return view('department.index');
    }

    public function get()
    {
        $department = Department::select(['id', 'name']);
        return Datatables::of($department)
            ->addColumn('actions', function ($department) {
                return $department->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    /**
     * Show the Department add form.
     *
     * @return Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'hospital_id' => $this->hospital->id 
        ]);
        return redirect()->route('admin.department.index')->withFlashSuccess(trans('alerts.backend.department.created'));
    }


    public function edit($id)
    {
        $department = Department::findorfail($id);
        return json_encode($department);
    }

    public function update(StoreDepartmentRequest $request)
    {
        $input = $request->except(['id']);
        $department = Department::findorfail($request->input('id'));
        $department->update($input); 
        return redirect()->route('admin.department.index')->withFlashSuccess(trans('alerts.backend.department.updated'));
    }

    public function destroy($id)
    {
        $department = Department::findorfail($id);
        $department->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.department.deleted'));
    }

    
}

