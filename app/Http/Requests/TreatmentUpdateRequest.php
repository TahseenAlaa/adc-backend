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
            'drug_id'   => 'bail|required|integer',
            'name'      => 'bail|required|string',
            'dose'      => 'bail|nullable|integer',
            'status'    => 'bail|required|boolean',
        ];
    }
}
