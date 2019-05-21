<?php

namespace App\Http\Controllers;

use App\Models\Doctor\Doctor;
use App\Models\Hospital\Hospital;
use App\Models\Department\Department;
use App\Models\User;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class DoctorController
 * @package App\Http\Controllers
 */
class DoctorController extends Controller
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
     * Show the Doctor List.
     * @return Response
     */
    public function index()
    {
        $department = Department::select(['id', 'name'])->get();
        return view('doctor.index')->with('department',$department);
    }

    /**
     * Show the Doctor add form.
     * @return Response
     */
    public function get()
    {
        $doctor = Doctor::select(['id', 'image', 'name', 'phone','department_id' ])->with('department');
        return Datatables::of($doctor)
            ->addColumn('actions', function ($doctor) {
                return $doctor->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreDoctorRequest $request)
    {
        $input = $request->all();
        // if($request->file('image')){
        //     $input['image'] = $this->imageUpload($request->file('image'), 'doctor');
        // }
        $user = User::storeUser($input, 4);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            $doctor = Doctor::create($input);
        }
   
        return redirect()->route('admin.doctor.index')->withFlashSuccess(trans('alerts.backend.doctor.created'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findorfail($id);
        return json_encode($doctor);
    }

    public function update(StoreDoctorRequest $request)
    {
        $doctor = Doctor::findorfail($request->input('id'));
        if($doctor) 
        {
            User::updateUser($doctor->user_id, $request->all());
            $doctor->update($request->all());
            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'doctor');
                $doctor->image = $filename;
                $doctor->save();
            }
        }
        
        return redirect()->route('admin.doctor.index')->withFlashSuccess(trans('alerts.backend.doctor.updated'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::findorfail($id);
        $doctor->delete();
        User::findorfail($doctor->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.doctor.deleted'));
    }

}

