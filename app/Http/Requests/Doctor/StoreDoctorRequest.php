<?php

namespace App\Http\Requests\Doctor;

use App\Http\Requests\Request;
use App\Models\User;

/**
 * Class StoreDoctorRequest
 * @package App\Http\Requests\Doctor
 */
class StoreDoctorRequest extends Request
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
            'name'     => 'required|max:50',
            'email'    => 'email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'min:5|max:15',
            'address'  => 'max:255',
            'phone'    => 'required|numeric|digits:10',
            'department_id' => 'required',
            'profile'    => 'max:255',
           // 'image'    => ' mimes:jpeg,jpg,png',
        ];

        if(!empty(Request::input('id')))
        {
            $rules['email'] = 'email|unique:users,email,'.Request::input('user_id').',id,deleted_at,NULL';
        }

        return $rules;
    }
}
