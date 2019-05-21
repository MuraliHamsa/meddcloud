<?php

namespace App\Http\Controllers;

use App\Models\Receptionist\Receptionist;
use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Http\Requests\Receptionist\StoreReceptionistRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class ReceptionistController
 * @package App\Http\Controllers
 */
class ReceptionistController extends Controller
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
     * Show the Receptionist List.
     *
     * @return Response
     */
    public function index()
    {
        return view('receptionist.index');
    }

    public function get()
    {
        $receptionist = Receptionist::select(['id', 'name', 'email', 'phone' ]);
        return Datatables::of($receptionist)
            ->addColumn('actions', function ($receptionist) {
                return $receptionist->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StoreReceptionistRequest $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $input['image'] = $this->imageUpload($request->file('image'), 'receptionist');
        }
        $user = User::storeUser($input, 10);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            Receptionist::create($input);
        }
   
        return redirect()->route('admin.receptionist.index')->withFlashSuccess(trans('alerts.backend.human_resources.receptionist.created'));
    }

    public function edit($id)
    {
        $receptionist = Receptionist::findorfail($id);
        return json_encode($receptionist);
    }

    public function update(StoreReceptionistRequest $request)
    {
        $receptionist = Receptionist::findorfail($request->input('id'));
        if($receptionist) 
        {
            User::updateUser($receptionist->user_id, $request->all());
            $receptionist->update($request->all());

            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'receptionist');
                $receptionist->image = $filename;
                $receptionist->save();
            }
        }
        
        return redirect()->route('admin.receptionist.index')->withFlashSuccess(trans('alerts.backend.human_resources.receptionist.updated'));
    }

    public function destroy($id)
    {
        $receptionist = Receptionist::findorfail($id);
        $receptionist->delete();
        User::findorfail($receptionist->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.human_resources.receptionist.deleted'));
    }

   

}

