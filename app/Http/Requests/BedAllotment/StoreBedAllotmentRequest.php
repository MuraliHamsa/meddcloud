<?php

namespace App\Http\Requests\BedAllotment;

use App\Http\Requests\Request;

/**
 * Class StoreBedAllotmentRequest
 * @package App\Http\Requests\BedAllotment
 */
class StoreBedAllotmentRequest extends Request
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
            'bed_id' => 'required|max:255',
            'patient_id' => 'required|max:255',
            'allotted_time'=>'required',
            'discharge_time' => 'required'
        ];
        return $rules;
    }
}
