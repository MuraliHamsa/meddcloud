<?php

namespace App\Http\Requests\Transcriptionist;

use App\Http\Requests\Request;
use App\Models\User;

/**
 * Class StoreTranscriptionistRequest
 * @package App\Http\Requests\Transcriptionist
 */
class StoreTranscriptionistRequest extends Request
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
            'email'    => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|min:5|max:15',
            'address'  => 'required|max:255',
            'phone'    => 'required|numeric|digits:10',
        ];

        if(!empty(Request::input('id')))
        {
            unset($rules['email']);
            unset($rules['password']);
            $rules['email'] = 'required|email|unique:users,email,'.Request::input('user_id').',id,deleted_at,NULL';
        }

        return $rules;
    }
}
