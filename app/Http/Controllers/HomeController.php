<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\UserGroup;
use App\Models\Settings;
use App\Models\Hospital\Hospital;
use Auth, Validator, Input, Redirect;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('home')->with('hospitals', $hospitals);
    }

    public function profile()
    {
        $group = UserGroup::getUserGroup(Auth::user()->id);
        return view('profile')->with('group',$group);
    }

    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required||min:3|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'password' => 'confirmed|min:5'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');

        if(!empty($request->input('password'))){ 
            $data['password'] = bcrypt($request->input('password'));
        }

        $user = User::findorfail(Auth::user()->id);
        $user->update($data);

        $group = UserGroup::getUserGroup($user->id);
        if($group->group['id'] > 2) {
            $groupname = Ucwords($group->group['name']);
        }
        return redirect()->route('admin.profile')->withFlashSuccess(trans('alerts.backend.profile.updated'));
    }

    public function settings()
    {
        $hospital = $this->getHospitalId();
        $settings = Settings::where('hospital_id', $hospital->id)->first();
        return view('settings')->with('settings',$settings);
    }

    public function updateSettings(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'system_vendor' => 'required|max:255',
            'title' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required',
            'currency' => 'required',
            'discount' => 'required'
        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['system_vendor'] = $request->input('system_vendor');
        $data['title'] = $request->input('title');
        $data['address'] = $request->input('address');
        $data['phone'] = $request->input('phone');
        $data['email'] = $request->input('email');
        $data['currency'] = $request->input('currency');
        $data['discount'] = $request->input('discount');

        
        $hospital = $this->getHospitalId();
        $settings = Settings::findorfail($request->input('id'));
        $settings->update($data);

        
        return redirect()->route('admin.settings')->withFlashSuccess(trans('alerts.backend.settings.updated'));
    }

    public function checkemail(Request $request)
    {
        $flag = 1;

        if($request->input('email'))
        {
            $user = User::where(['email' => $request->input('email')]);
            if($request->input('id') > 0){
                $user->where('id', '!=', $request->input('id'));
            }
            $result = $user->get();
            if (count($result) > 0)
            {
                $flag = 0;
            }
        }

        return $flag;
    }

}
