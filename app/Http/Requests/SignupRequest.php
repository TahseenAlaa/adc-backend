<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name'   => 'bail|required|string',
            'username'    => 'bail|required|string',
            'profile_pic' => 'bail|nullable|string',
            'job_title'   => 'bail|nullable|string',
            'password'    => 'bail|required|string',
        ];
    }
}
