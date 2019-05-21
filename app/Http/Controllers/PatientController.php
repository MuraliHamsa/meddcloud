<?php

namespace App\Http\Controllers;

use App\Models\Patient\Patient;
use App\Models\Payment\Payment;
use App\Models\Hospital\Hospital;
use App\Models\Doctor\Doctor;
use App\Models\Settings;
use App\Models\BloodBank;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\Patient\StorePatientRequest;
use Yajra\Datatables\Facades\Datatables;
use App\Helpers\SMSHelper;
use Auth, DB;

/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
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
     * Show the Patient List.
     *
     * @return Response
     */
    public function index()
    {
        $doctors = Doctor::select(['id', 'name'])->where('hospital_id', $this->hospital->id)->get();
        $bloodgroup = BloodBank::select(['id', 'name'])->get();
        return view('patient.index')->with(['doctors' => $doctors, 'bloodgroup' => $bloodgroup]);
    }

    public function get()
    {
        $settings = Settings::where('hospital_id', $this->hospital->id)->first();

        $patient = Patient::select(['id', 'patientId', 'created_at', 'name', 'email', 'phone', 'blood_bank_id', 'doctor_id', 'ref_doctor_id','birthdate', 'visit'])->with(['doctor', 'blood_bank'])->with(['payment'=> function($query){
                $query->addSelect('id', 'patient_id', DB::raw("SUM(gross_total) as gross_total"));
                $query->where('status',0);
                $query->groupBy('patient_id');
            }]);

       
        return Datatables::of($patient)
            ->addColumn('actions', function ($patient) {
                return $patient->action_buttons;
            })
            ->editColumn('created_at', function ($patient) {
                return with(new Carbon($patient->created_at))->format('d-m-Y');
            })
            ->editColumn('gross_total', function ($patient) use($settings) {
                $amount = 0;
                if(count($patient->payment) > 0){
                    $amount = $patient->payment[0]['gross_total'];
                }
                return $settings->currency.' '.$amount;
            })
            ->editColumn('birthdate', function ($patient) {
                return $patient->birthdate ? with(new Carbon($patient->birthdate))->format('d-m-Y') : '';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StorePatientRequest $request)
    {
        $input = $request->all();
        // if($request->file('image')){
        //     $input['image'] = $this->imageUpload($request->file('image'), 'patient');
        // }
        $user = User::storeUser($input, 5);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            $input['patientId'] = rand(10000, 1000000);
            $input['birthdate'] = date('Y-m-d', strtotime($input['birthdate']));
            if(empty($input['email'])){
                $input['email'] = $user->email;
            }
            $patient = Patient::create($input);

            $prefix = $patient->sex=1  ? 'Mr' : 'Mrs';
            $message = 'Dear '.$prefix.'. '.$patient->name.', Patient ID:'.$patient->patientId.', Date:'.date('d-m-Y', strtotime($patient->created_at)).'. Thank you for choosing '.$this->hospital->name.' .Wishing you a pleasant visit. Thank You. Powered by Meddcloud.'; 
            SMSHelper::sendsms($patient->phone, $message);
        }

        return redirect()->route('admin.patient.index')->withFlashSuccess(trans('alerts.backend.patient.created'));
    }

    public function edit($id)
    {
        $patient = Patient::findorfail($id);
        return json_encode($patient);
    }

    public function update(StorePatientRequest $request)
    {
        $patient = Patient::findorfail($request->input('id'));

        if($patient) 
        {
            User::updateUser($patient->user_id, $request->all());
            $patient->update($request->all());
            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'patient');
                $patient->image = $filename;
                $patient->save();
            }
        }
       
        return redirect()->route('admin.patient.index')->withFlashSuccess(trans('alerts.backend.patient.updated'));
    }

    public function destroy($id)
    {
        $patient = Patient::findorfail($id);
        $patient->delete();
        User::findorfail($patient->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.patient.deleted'));
    }

    public function show($id)
    {
        $patient = Patient::with(['doctor', 'ref_doctor', 'blood_bank'])->findorfail($id);
        return view('patient.show')->with('patient', $patient);
    }

    public function invoice($id, $status=0)
    {
    	$payment = Payment::with('payment_bill_category')->where('patient_id', $id)->where('status', $status)->get();
    	$patient = Patient::where('id', $id)->first();
        $settings = Settings::where('hospital_id', $this->hospital->id)->first();
        
        return view('patient.invoice')->with(['payment' => $payment, 'hospital' => $this->hospital, 'patient'=> $patient, 'settings' => $settings, 'status' => $status]);
    }

    public function makePaid($id)
    {
        Payment::where(['patient_id' => $id, 'status' => 2])->update(['status' => 1]);
        Payment::where(['patient_id' => $id, 'status' => 0])->update(['status' => 2]);

        return redirect()->route('admin.patient.index')->withFlashSuccess(trans('alerts.backend.financial-activities.payment.updated'));
    }

    public function bill($id)
    {
        $payment = Payment::with('payment_bill_category')->where('patient_id', $id)->orderBy('id', 'desc')->first();
        $patient = Patient::with('ref_doctor')->where('id', $id)->first();
        $settings = Settings::where('hospital_id', $this->hospital->id)->first();
        
        return view('patient.bill')->with(['payment' => $payment, 'hospital' => $this->hospital, 'patient'=> $patient, 'settings' => $settings]);
    }

}
