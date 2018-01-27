<?php

namespace App\Http\Requests\ExpenseCategory;

use App\Http\Requests\Request;

/**
 * Class StoreExpenseCategoryRequest
 * @package App\Http\Requests\ExpenseCategory
 */
class StoreExpenseCategoryRequest extends Request
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
