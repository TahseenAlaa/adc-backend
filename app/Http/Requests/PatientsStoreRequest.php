<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientsStoreRequest extends FormRequest
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
            'full_name'     => 'bail|required|string',
            'phone'         => 'bail|nullable|string',
            'occupation'    => 'bail|nullable|string',
            'gender'        => 'bail|nullable|boolean',
            'birthdate'     => 'bail|nullable|date',
            'address'       => 'bail|nullable|string',
            'smoker'        => 'bail|nullable|string',
            'drinker'       => 'bail|nullable|string',
            'family_dm'     => 'bail|nullable|string',
            'gestational_dm' => 'bail|nullable|string',
            'weight_baby'   => 'bail|nullable|string',
            'hypert'        => 'bail|nullable|string',
            'family_ihd'    => 'bail|nullable|string',
            'parity'        => 'bail|nullable|string',
            'smbg'          => 'bail|nullable|string',
            'ihd'           => 'bail|nullable|string',
            'cva'           => 'bail|nullable|string',
            'pvd'           => 'bail|nullable|string',
            'neuro'         => 'bail|nullable|string',
            'weight'        => 'bail|nullable|numeric',
            'height'        => 'bail|nullable|numeric',
            'wc'            => 'bail|nullable|string',
            'bmi'           => 'bail|nullable|numeric',
            'hip'           => 'bail|nullable|string',
            'retino'        => 'bail|nullable|string',
            'nonpro'        => 'bail|nullable|string',
            'prolif'        => 'bail|nullable|string',
            'macul'         => 'bail|nullable|string',
            'insul'         => 'bail|nullable|string',
            'amput'         => 'bail|nullable|string',
            'ed'            => 'bail|nullable|string',
            'nafld'         => 'bail|nullable|string',
            'dermo'         => 'bail|nullable|string',
            'dfoot'         => 'bail|nullable|string',
            'date_insulin'  => 'bail|nullable|string',
            'duration_insulin' => 'bail|nullable|string',
            'duration_dm'   => 'bail|nullable|string',
            'glycemic'      => 'bail|nullable|string',
            'lipid'         => 'bail|nullable|string',
            'pressure'      => 'bail|nullable|string',
            'f_height'      => 'bail|nullable|numeric',
            'm_height'      => 'bail|nullable|numeric',
            'mid_height'    => 'bail|nullable|numeric',
            'fa1c'          => 'bail|nullable|string',
            'sa2c'          => 'bail|nullable|string',
            'referral'      => 'bail|nullable|string',
            'created_by'    => 'bail|nullable|numeric',
            'updated_by'    => 'bail|nullable|numeric',
        ];
    }
}
