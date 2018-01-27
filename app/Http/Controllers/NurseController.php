<?php

namespace App\Http\Controllers;

use App\Models\Nurse\Nurse;
use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Http\Requests\Nurse\StoreNurseRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class NurseController
 * @package App\Http\Controllers
 */
class NurseController extends Controller
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
        return view('nurse.index');
    }

    public function get()
    {
        $nurse = Nurse::select(['id', 'name', 'email', 'phone' ]);
        return Datatables::of($nurse)
            ->addColumn('actions', function ($nurse) {
                return $nurse->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreNurseRequest $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $input['image'] = $this->imageUpload($request->file('image'), 'nurse');
        }
        $user = User::storeUser($input, 6);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            Nurse::create($input);
        }
   
        return redirect()->route('admin.nurse.index')->withFlashSuccess(trans('alerts.backend.human_resources.nurse.created'));
    }

    public function edit($id)
    {
        $nurse = Nurse::findorfail($id);
        return json_encode($nurse);
    }

    public function update(StoreNurseRequest $request)
    {
        $nurse = Nurse::findorfail($request->input('id'));
        if($nurse) 
        {
            User::updateUser($nurse->user_id, $request->all());
            $nurse->update($request->all());

            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'nurse');
                $nurse->image = $filename;
                $nurse->save();
            }
        }
        
        return redirect()->route('admin.nurse.index')->withFlashSuccess(trans('alerts.backend.human_resources.nurse.updated'));
    }

    public function destroy($id)
    {
        $nurse = Nurse::findorfail($id);
        $nurse->delete();
        User::findorfail($nurse->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.human_resources.nurse.deleted'));
    }

   

}

