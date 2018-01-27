<?php

namespace App\Http\Requests\Bed;

use App\Http\Requests\Request;

/**
 * Class StoreBedRequest
 * @package App\Http\Requests\Bed
 */
class StoreBedRequest extends Request
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
            'bed_category_id' => 'required',
            'number' => 'required|numeric',
            'description' => 'required'
            
        ];
        
        return $rules;
    }
}
