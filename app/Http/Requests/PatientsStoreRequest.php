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
            'phone'         => 'bail|required|string',
            'occupation'    => 'bail|required|string',
            'gender'        => 'bail|required|boolean',
            'birthdate'     => 'bail|required|date',
            'address'       => 'bail|required|string',
            'smoker'        => 'bail|required|string',
            'drinker'       => 'bail|required|string',
            'family_dm'     => 'bail|required|string',
            'gestational_dm' => 'bail|required|string',
            'weight_baby'   => 'bail|required|string',
            'hypert'        => 'bail|required|string',
            'family_ihd'    => 'bail|required|string',
            'parity'        => 'bail|required|string',
            'smbg'          => 'bail|required|string',
            'ihd'           => 'bail|required|string',
            'cva'           => 'bail|required|string',
            'pvd'           => 'bail|required|string',
            'neuro'         => 'bail|required|string',
            'weight'        => 'bail|required|numeric',
            'height'        => 'bail|required|numeric',
            'wc'            => 'bail|required|string',
            'bmi'           => 'bail|required|numeric',
            'hip'           => 'bail|required|string',
            'retino'        => 'bail|required|string',
            'nonpro'        => 'bail|required|string',
            'prolif'        => 'bail|required|string',
            'macul'         => 'bail|required|string',
            'insul'         => 'bail|required|string',
            'amput'         => 'bail|required|string',
            'ed'            => 'bail|required|string',
            'nafld'         => 'bail|required|string',
            'dermo'         => 'bail|required|string',
            'dfoot'         => 'bail|required|string',
            'date_insulin'  => 'bail|required|string',
            'duration_insulin' => 'bail|required|string',
            'duration_dm'   => 'bail|required|string',
            'glycemic'      => 'bail|required|string',
            'lipid'         => 'bail|required|string',
            'pressure'      => 'bail|required|string',
            'f_height'      => 'bail|required|numeric',
            'm_height'      => 'bail|required|numeric',
            'mid_height'    => 'bail|required|numeric',
            'fa1c'          => 'bail|required|string',
            'sa2c'          => 'bail|required|string',
            'referral'      => 'bail|required|string',
            'created_by'    => 'bail|required|numeric',
            'updated_by'    => 'bail|required|numeric',
        ];
    }
}
