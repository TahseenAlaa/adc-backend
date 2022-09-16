<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentUpdateRequest extends FormRequest
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
            'drug_id'             => 'bail|required|integer',
            'patient_id'          => 'bail|required|integer',
            'patient_picture'     => 'bail|nullable|image|file|max:10240',
            'name'                => 'bail|required|string',
            'dose'                => 'bail|required|integer',
            'status'              => 'bail|nullable|boolean',
        ];
    }
}
