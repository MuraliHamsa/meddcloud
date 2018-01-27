<?php

namespace App\Http\Requests\Pharmacy;

use App\Http\Requests\Request;

/**
 * Class StorePaymentRequest
 * @package App\Http\Requests\Payment
 */
class StorePharmacyRequest extends Request
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
            'patient_id' => 'required',
            'medicine_amount.*' => 'required'
            
        ];
        
        return $rules;
    }
}
