<?php

namespace App\Http\Requests\Medicine;

use App\Http\Requests\Request;

/**
 * Class StoreMedicineRequest
 * @package App\Http\Requests\Medicine
 */
class StoreUploadMedicineRequest extends Request
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
            'medicine_category_id' => 'required',
            'price' => 'required|numeric',
            'generic' => 'required',
            'effects' => 'required',
            'import_file' => 'required'
        ];
        
        return $rules;
    }
}
