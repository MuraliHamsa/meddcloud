<?php

namespace App\Http\Controllers;

use App\Models\Transcriptionist\Transcriptionist;
use App\Models\Hospital\Hospital;
use App\Models\User;
use App\Http\Requests\Transcriptionist\StoreTranscriptionistRequest;
use Yajra\Datatables\Facades\Datatables;
use Auth;

/**
 * Class TranscriptionistController
 * @package App\Http\Controllers
 */
class TranscriptionistController extends Controller
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
     * Show the Transcriptionist List.
     *
     * @return Response
     */
    public function index()
    {
        return view('transcriptionist.index');
    }

    public function get()
    {
        $transcriptionist = Transcriptionist::select(['id', 'name', 'email', 'phone' ]);
        return Datatables::of($transcriptionist)
            ->addColumn('actions', function ($transcriptionist) {
                return $transcriptionist->action_buttons;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderBy('id', 'desc')
            ->make(true);
    }

    public function store(StoreTranscriptionistRequest $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $input['image'] = $this->imageUpload($request->file('image'), 'transcriptionist');
        }
        $user = User::storeUser($input, 11);
        if($user){
            $input['hospital_id'] = $this->hospital->id;
            $input['user_id'] = $user->id;
            Transcriptionist::create($input);
        }
   
        return redirect()->route('admin.transcriptionist.index')->withFlashSuccess(trans('alerts.backend.human_resources.transcriptionist.created'));
    }

    public function edit($id)
    {
        $transcriptionist = Transcriptionist::findorfail($id);
        return json_encode($transcriptionist);
    }

    public function update(StoreTranscriptionistRequest $request)
    {
        $transcriptionist = Transcriptionist::findorfail($request->input('id'));
        if($transcriptionist) 
        {
            User::updateUser($transcriptionist->user_id, $request->all());
            $transcriptionist->update($request->all());

            if($request->file('image')){
                $filename = $this->imageUpload($request->file('image'), 'transcriptionist');
                $transcriptionist->image = $filename;
                $transcriptionist->save();
            }
        }
        
        return redirect()->route('admin.transcriptionist.index')->withFlashSuccess(trans('alerts.backend.human_resources.transcriptionist.updated'));
    }

    public function destroy($id)
    {
        $transcriptionist = Transcriptionist::findorfail($id);
        $transcriptionist->delete();
        User::findorfail($transcriptionist->user_id)->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.human_resources.transcriptionist.deleted'));
    }

   

}

