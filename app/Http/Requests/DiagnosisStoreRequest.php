<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisStoreRequest extends FormRequest
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
            'patient_id'           => 'bail|required|integer',
            'patient_history_id'   => 'bail|required|integer',
            'symptoms'             => 'bail|required|string',
            'is_confirmed'         => 'bail|required|boolean',
            'clinical_notes'       => 'bail|nullable|string',
        ];
    }
}
