<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\Request;

/**
 * Class StorePaymentRequest
 * @package App\Http\Requests\Payment
 */
class StorePaymentRequest extends Request
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
            'category_amount.*' => 'required'
            
        ];
        
        return $rules;
    }
}
