<?php

namespace App\Http\Controllers;

use App\Models\Laboratorist\Laboratorist;
use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Http\Requests\Laboratorist\StoreLaboratoristRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class LaboratoristController
 * @package App\Http\Controllers
 */
class LaboratoristController extends Controller
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
     * Show the Laboratorist List.
     *
     * @return Response
     */
    public function index()
    {
        return view('laboratorist.index');
    }

    public function get()
    {
        $laboratorist = Laboratorist::select(['id', 'name', 'email', 'phone' ]);
        return Datatables::of($laboratorist)
            ->addColumn('actions', function ($laboratorist) {
                return $laboratorist->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreLaboratoristRequest $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $input['image'] = $this->imageUpload($request->file('image'), 'laboratorist');
        }
        $user = User::storeUser($input, 8);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            Laboratorist::create($input);
        }
   
        return redirect()->route('admin.laboratorist.index')->withFlashSuccess(trans('alerts.backend.human_resources.laboratorist.created'));
    }

    public function edit($id)
    {
        $laboratorist = Laboratorist::findorfail($id);
        return json_encode($laboratorist);
    }

    public function update(StoreLaboratoristRequest $request)
    {
        $laboratorist = Laboratorist::findorfail($request->input('id'));
        if($laboratorist) 
        {
            User::updateUser($laboratorist->user_id, $request->all());
            $laboratorist->update($request->all());

            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'laboratorist');
                $laboratorist->image = $filename;
                $laboratorist->save();
            }
        }
        
        return redirect()->route('admin.laboratorist.index')->withFlashSuccess(trans('alerts.backend.human_resources.laboratorist.updated'));
    }

    public function destroy($id)
    {
        $laboratorist = Laboratorist::findorfail($id);
        $laboratorist->delete();
        User::findorfail($laboratorist->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.human_resources.laboratorist.deleted'));
    }

   

}

