<?php

namespace App\Http\Requests\Patient;

use App\Http\Requests\Request;
use App\Models\User;

/**
 * Class StorePatientRequest
 * @package App\Http\Requests\Patient
 */
class StorePatientRequest extends Request
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
            'doctor_id'  => 'required',
            'ref_doctor_id'  => 'required',
            'name'     => 'required|max:50',
            'email'    => 'email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'min:5|max:15',
            'address'  => 'max:255',
            'phone'    => 'required|numeric|digits:10',
            'sex' => 'required',
            'blood_bank_id'    => 'required',
            // 'image'    => ' mimes:jpeg,jpg,png',
        ];

        if(!empty(Request::input('id')))
        {
            $rules['email'] = 'email|unique:users,email,'.Request::input('user_id').',id,deleted_at,NULL';
        }

        return $rules;
    }
}
