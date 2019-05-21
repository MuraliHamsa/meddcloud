<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Hospital\Hospital;
use Illuminate\Contracts\Filesystem\Filesystem;
use DB, Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function imageUpload($image, $folder)
    { 
        $s3 = \Storage::disk('s3');
        $extension = $image->getClientOriginalExtension();
        $filename = md5(uniqid(mt_rand())).'.'.$extension;
        $filePath = '/'.$folder.'/' . $filename;
        $s3->put($filePath, file_get_contents($image), 'public');
        return $filename;
    }

    public function getHospitalId()
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
