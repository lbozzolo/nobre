<?php

namespace Nobre\Http\Requests;

use Nobre\Models\Applicant;
use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantRequest extends FormRequest
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
        return Applicant::$rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'lastname.required' => 'El campo apellido es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'phone.required' => 'El campo teléfono es obligatorio',
            'country.required' => 'El campo país es obligatorio',
        ];
    }

//    public function response()
//    {
//        return url("/web/#form-wrapper");
//    }
}
