<?php

namespace App\Http\Controllers;

use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Models\Settings;
use App\Http\Requests\Hospital\StoreHospitalRequest;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class HospitalController
 * @package App\Http\Controllers
 */
class HospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Hospitals List.
     * @return Response
     */
    public function index()
    {
        return view('hospital.index');
    }

    public function store(StoreHospitalRequest $request)
    {
        $user = User::storeUser($request->all(), 9);

        if($user){
            $hospital = Hospital::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'user_id' => $user->id,
                'active' => 1
            ]);

            Settings::create([
                'hospital_id' => $hospital->id,
                'title' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'system_vendor' => 'Code Aristos | Hospital management System',
                'discount' => 2,
                'currency' => '$'
            ]);
        }

        return redirect()->route('admin.hospital.index')->withFlashSuccess(trans('alerts.backend.hospital.created'));
    }

    public function get()
    {
        $hospital = Hospital::select(['id', 'name', 'email', 'phone','address']);
        return Datatables::of($hospital)
            ->addColumn('actions', function ($hospital) {
                return $hospital->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    public function edit($id)
    {
        $hospital = Hospital::findorfail($id);
        return json_encode($hospital);
    }

    public function update(StoreHospitalRequest $request)
    {
        $hospital = Hospital::findorfail($request->input('id'));
        if($hospital) 
        {
            User::updateUser($hospital->user_id, $request->all());
            $hospital->update($request->all());
        }   
        
        return redirect()->route('admin.hospital.index')->withFlashSuccess(trans('alerts.backend.hospital.created'));
    }

    public function destroy($id)
    {
        $hospital = Hospital::findorfail($id);
        $hospital->delete();
        User::findorfail($hospital->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.hospital.deleted'));
    }

}

