<?php

namespace App\Http\Requests\MedicineCategory;

use App\Http\Requests\Request;

/**
 * Class StoreMedicineCategoryRequest
 * @package App\Http\Requests\MedicineCategory
 */
class StoreMedicineCategoryRequest extends Request
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
            'description' => 'required|max:255'
        ];
        return $rules;
    }
}
