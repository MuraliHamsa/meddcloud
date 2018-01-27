<?php

namespace App\Http\Requests\Donor;

use App\Http\Requests\Request;

/**
 * Class StoreDonorRequest
 * @package App\Http\Requests\Medicine
 */
class StoreDonorRequest extends Request
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
            'name' => 'required|max:255',
            'blood_bank_id' => 'required',
            'age' => 'required|numeric',
            'last_donation' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email'
        ];
        
        return $rules;
    }
}
