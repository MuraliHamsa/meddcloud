<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist\Pharmacist;
use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Http\Requests\Pharmacist\StorePharmacistRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class PharmacistController
 * @package App\Http\Controllers
 */
class PharmacistController extends Controller
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
     * Show the Pharmacist List.
     *
     * @return Response
     */
    public function index()
    {
        return view('pharmacist.index');
    }

    public function get()
    {
        $pharmacist = Pharmacist::select(['id', 'name', 'email', 'phone' ]);
        return Datatables::of($pharmacist)
            ->addColumn('actions', function ($pharmacist) {
                return $pharmacist->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StorePharmacistRequest $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $input['image'] = $this->imageUpload($request->file('image'), 'pharmacist');
        }
        $user = User::storeUser($input, 7);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            Pharmacist::create($input);
        }
   
        return redirect()->route('admin.pharmacist.index')->withFlashSuccess(trans('alerts.backend.human_resources.pharmacist.created'));
    }

    public function edit($id)
    {
        $pharmacist = Pharmacist::findorfail($id);
        return json_encode($pharmacist);
    }

    public function update(StorePharmacistRequest $request)
    {
        $pharmacist = Pharmacist::findorfail($request->input('id'));
        if($pharmacist) 
        {
            User::updateUser($pharmacist->user_id, $request->all());
            $pharmacist->update($request->all());

            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'pharmacist');
                $pharmacist->image = $filename;
                $pharmacist->save();
            }
        }
        
        return redirect()->route('admin.pharmacist.index')->withFlashSuccess(trans('alerts.backend.human_resources.pharmacist.updated'));
    }

    public function destroy($id)
    {
        $pharmacist = Pharmacist::findorfail($id);
        $pharmacist->delete();
        User::findorfail($pharmacist->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.human_resources.pharmacist.deleted'));
    }

   

}

