<?php

namespace App\Http\Requests\Report;

use App\Http\Requests\Request;

/**
 * Class StoreReportRequest
 * @package App\Http\Requests\Report
 */
class StoreReportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        $rules = [
            'report_type_id' => 'required',
            'description' => 'required|max:255',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'add_date' => 'required'
            
        ];
        return $rules;
    }
}
