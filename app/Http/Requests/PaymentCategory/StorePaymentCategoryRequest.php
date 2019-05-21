<?php

namespace App\Http\Requests\PaymentCategory;

use App\Http\Requests\Request;

/**
 * Class StorePaymentCategoryRequest
 * @package App\Http\Requests\PaymentCategory
 */
class StorePaymentCategoryRequest extends Request
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
            'payment_billing_id' => 'required',
            'category' => 'required|max:255',
            'amount' => 'required|numeric'
            
        ];
        return $rules;
    }
}
