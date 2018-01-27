<?php
namespace App\Helpers;

use App\Models\Settings;
use App\Models\Hospital\Hospital;
use App\Models\Doctor\Doctor;
use App\Models\Patient\Patient;
use App\Models\Nurse\Nurse;
use App\Models\Transcriptionist\Transcriptionist;
use App\Models\Receptionist\Receptionist;
use App\Models\Pharmacist\Pharmacist;
use App\Models\Laboratorist\Laboratorist;
use App\Models\Accountant\Accountant;
use App\Models\Payment\Payment;
use App\Models\Medicine\Medicine;
use App\Models\Report\Report;
use App\Models\Donor\Donor;
use App\Models\Bed\Bed;
use App\Models\Expense\Expense;
use App\Models\Department\Department;
use Auth, DB;

class NotificationHelper 
{

  	public static function getNotification() 
  	{ 
  		$data = [];
	  	if(Auth::user()->group[0]['name'] != 'superadmin')
        {
            $hospital = NotificationHelper::GetHospitalId();

            $data['doctor'] = Doctor::where('hospital_id', $hospital->id)->count();
            $data['patient'] = Patient::where('hospital_id', $hospital->id)->count();
            $data['nurse'] = Nurse::where('hospital_id', $hospital->id)->count();
            $data['transcriptionist'] = Transcriptionist::where('hospital_id', $hospital->id)->count();
            $data['receptionist'] = Receptionist::where('hospital_id', $hospital->id)->count();
            $data['pharmacist'] = Pharmacist::where('hospital_id', $hospital->id)->count();
            $data['laboratorist'] = Laboratorist::where('hospital_id', $hospital->id)->count();
            $data['accountant'] = Accountant::where('hospital_id', $hospital->id)->count();
            $data['payment'] = Payment::where('hospital_id', $hospital->id)->count();
            $data['medicine'] = Medicine::where('hospital_id', $hospital->id)->count();
            $data['operation_report'] = Report::where(['hospital_id' => $hospital->id, 'report_type_id' => 2])->count();
            $data['birth_report'] = Report::where(['hospital_id' => $hospital->id, 'report_type_id' => 1])->count();
            $data['donor'] = Donor::where('hospital_id', $hospital->id)->count();
            $data['bed'] = Bed::where('hospital_id', $hospital->id)->count();
            $data['expense'] = Expense::where('hospital_id', $hospital->id)->count();
            $data['department'] = Department::where('hospital_id', $hospital->id)->count();
            $payment = Payment::select([DB::raw("SUM(gross_total) as amount")])->where('hospital_id', $hospital->id)->where('status', '!=', 0)->first();
            $data['total_payment'] = $payment->amount;
            $settings = Settings::where('hospital_id', $hospital->id)->first();
            $data['settings'] = $settings->currency;
            $data['bedcount'] = Bed::where('hospital_id' ,$hospital->id)->where('last_discharge_time', '<=', date('d/m/Y H:i A'))->count();
            $data['patientcount'] = Patient::where('hospital_id' ,$hospital->id)->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), date('Y-m-d'))->count();
            $data['paymentcount'] = Payment::where('hospital_id' ,$hospital->id)->where('payment_date', date('Y-m-d'))->count();
            $data['donorcount'] = Donor::where('hospital_id' ,$hospital->id)->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), date('Y-m-d'))->count();
            $data['medicinecount'] = Medicine::where('hospital_id' ,$hospital->id)->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), date('Y-m-d'))->count();
            $data['reportcount'] = Report::where('hospital_id' ,$hospital->id)->where('add_date', date('Y-m-d'))->count();
        }
        return $data;
	}

	public static function GetHospitalId()
	{
		$role = strtolower(Auth::user()->group[0]['name']);
        if($role != 'superadmin'){
            if($role == 'admin')
            {
                $hospital = Hospital::where('user_id', Auth::user()->id)->first();
            } else {
                $hospital = DB::table('hospital')
                    ->select(['hospital.id', 'hospital.name'])
                    ->join($role, 'hospital.id', '=', $role.'.hospital_id')
                    ->where($role.'.user_id', Auth::user()->id)
                    ->first();
            }
            return $hospital;
        }
	}

}

?>
