<?php

namespace App\Http\Requests\PaymentBilling;

use App\Http\Requests\Request;

/**
 * Class StorePaymentBillingRequest
 * @package App\Http\Requests\PaymentBilling
 */
class StorePaymentBillingRequest extends Request
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
            'name' => 'required|max:255'
            
        ];
        return $rules;
    }
}
