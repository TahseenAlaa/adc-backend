<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyStoreRequest extends FormRequest
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
            'name'             => 'bail|required|string',
            'batch_no'         => 'bail|nullable|string',
            'expire_date'      => 'bail|required|date',
            'treatment_type'   => 'bail|nullable|string',
            'dosage'           => 'bail|nullable|integer',
            'quantity'         => 'bail|required|integer',
            'notes'            => 'bail|nullable|string',
        ];
    }
}
