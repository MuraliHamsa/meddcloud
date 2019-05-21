<?php

namespace App\Http\Controllers;

use App\Models\Accountant\Accountant;
use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Http\Requests\Accountant\StoreAccountantRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class AccountantController
 * @package App\Http\Controllers
 */
class AccountantController extends Controller
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
     * Show the Accountant List.
     *
     * @return Response
     */
    public function index()
    {
        return view('accountant.index');
    }

    public function get()
    {
        $accountant = Accountant::select(['id', 'name', 'email', 'phone' ]);
        return Datatables::of($accountant)
            ->addColumn('actions', function ($accountant) {
                return $accountant->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StoreAccountantRequest $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $input['image'] = $this->imageUpload($request->file('image'), 'accountant');
        }
        $user = User::storeUser($input, 3);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            Accountant::create($input);
        }
   
        return redirect()->route('admin.accountant.index')->withFlashSuccess(trans('alerts.backend.human_resources.accountant.created'));
    }

    public function edit($id)
    {
        $accountant = Accountant::findorfail($id);
        return json_encode($accountant);
    }

    public function update(StoreAccountantRequest $request)
    {
        $accountant = Accountant::findorfail($request->input('id'));
        if($accountant) 
        {
            User::updateUser($accountant->user_id, $request->all());
            $accountant->update($request->all());

            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'accountant');
                $accountant->image = $filename;
                $accountant->save();
            }
        }
        
        return redirect()->route('admin.accountant.index')->withFlashSuccess(trans('alerts.backend.human_resources.accountant.updated'));
    }

    public function destroy($id)
    {
        $accountant = Accountant::findorfail($id);
        $accountant->delete();
        User::findorfail($accountant->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.human_resources.accountant.deleted'));
    }

   

}

