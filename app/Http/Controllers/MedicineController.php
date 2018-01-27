<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Medicine\Medicine;
use App\Models\MedicineCategory\MedicineCategory;
use App\Http\Requests\Medicine\StoreMedicineRequest;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;
use Excel, DB, Validator;


/**
 * Class MedicineController
 * @package App\Http\Controllers
 */
class MedicineController extends Controller
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
        $medicine_category = MedicineCategory::where('hospital_id', $this->hospital->id)->get();
        return view('medicine.index')->with('medicine_category', $medicine_category);
    }

    public function get()
    {
        $medicine = Medicine::select(['id', 'name', 'price', 'quantity', 'generic', 'company', 'effects', 'expiry_date', 'medicine_category_id'])->with('medicine_category');
        return Datatables::of($medicine)
            ->addColumn('actions', function ($medicine) {
                return $medicine->action_buttons;
            })
            ->editColumn('expiry_date', function ($medicine) {
                return with(new Carbon($medicine->expiry_date))->format('d-m-Y');
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->where('hospital_id', $this->hospital->id)
            ->orderby('id', 'desc')
            ->make(true);
    }

    public function store(StoreMedicineRequest $request)
    {
        $input = $request->all();
        $input['hospital_id'] = $this->hospital->id;
        $input['expiry_date'] = date('Y-m-d', strtotime($input['expiry_date']));
         
        if($request->input('id') > 0){
            $medicine = Medicine::findorfail($request->input('id'));
            $medicine->update($input);
            $msg = 'updated';
        } else {
            Medicine::create($input);
            $msg = 'created';
        }
        
        return redirect()->route('admin.medicine.index')->withFlashSuccess(trans('alerts.backend.medicine.medicine.'.$msg));
    }

    public function edit($id)
    {
        $medicine = Medicine::findorfail($id);
        return json_encode($medicine);
    }

    public function destroy($id)
    {
        $medicine = Medicine::findorfail($id);
        $medicine->delete();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.medicine.medicine.deleted'));
    }

    public function import(Request $request)
    {
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count())
            {
                foreach ($data as $key => $value) 
                {
                    $medicinecategory = MedicineCategory::where('name', $value->category)->first();
                    if(!$medicinecategory)
                    {
                        $medicinecategory = MedicineCategory::create([
                            'name' => $value->category,
                            'description' => $value->category,
                            'hospital_id' => $this->hospital->id
                        ]);
                    }
                    $insert[] = [
                        'name' => $value->name,
                        'medicine_category_id' => $medicinecategory->id,
                        'price' => $value->price,
                        'quantity' => $value->quantity,
                        'generic' => $value->generic_name,
                        'company' => $value->company,
                        'effects' => $value->effects,
                        'expiry_date' => date('Y-m-d', strtotime($value->expiry_date)),
                        'hospital_id' => $this->hospital->id
                    ];
                }
                if(!empty($insert))
                {
                    DB::table('medicine')->insert($insert);
                }
            }
        }

        return redirect()->route('admin.medicine.index')->withFlashSuccess(trans('alerts.backend.medicine.medicine.imported'));
    }
}

