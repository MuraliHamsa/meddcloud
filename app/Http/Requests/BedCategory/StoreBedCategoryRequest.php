<?php

namespace App\Http\Requests\BedCategory;

use App\Http\Requests\Request;

/**
 * Class StoreBedCategoryRequest
 * @package App\Http\Requests\BedCategory
 */
class StoreBedCategoryRequest extends Request
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
            'category' => 'required|max:255',
            'description' => 'required|max:255'
        ];
        return $rules;
    }
}
