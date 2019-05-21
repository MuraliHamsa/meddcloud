<?php

namespace App\Http\Controllers;

use App\Models\Donor\Donor;
use App\Models\BloodBank;
use App\Http\Requests\Donor\StoreDonorRequest;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;

/**
 * Class DonorController
 * @package App\Http\Controllers
 */
class DonorController extends Controller
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
        $blood_bank = BloodBank::all();
        return view('donor.index')->with('blood_bank', $blood_bank);
    }

    public function get()
    {
        $donor = Donor::select(['id', 'name', 'blood_bank_id', 'age', 'sex', 'last_donation', 'phone', 'email'])->with('blood_bank');
        return Datatables::of($donor)
            ->addColumn('actions', function ($donor) {
                return $donor->action_buttons;
            })
            ->editColumn('sex', function ($donor) {
                return ($donor->sex == 1) ? 'Male' : 'Female';
            })
            ->editColumn('age', '{{$age}} Yrs')
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreDonorRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;
        $input['last_donation'] = date('Y-m-d', strtotime($input['last_donation']));

        if($request->input('id') > 0){
            $medicine = Donor::findorfail($request->input('id'));
            $medicine->update($input);
            $msg = 'updated';
        } else {
            Donor::create($input);
            $msg = 'created';
        }
        
        return redirect()->route('admin.donor.index')->withFlashSuccess(trans('alerts.backend.donor.'.$msg));
    }

    public function edit($id)
    {
        $donor = Donor::findorfail($id);
        return json_encode($donor);
    }

    public function destroy($id)
    {
        $donor = Donor::findorfail($id);
        $donor->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.donor.deleted'));
    }

}

