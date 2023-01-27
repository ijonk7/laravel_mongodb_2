<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'hobby' => 'required',
            'date_of_birth' => 'required|date',
            'photo' => 'image',
            'age' => 'required|numeric',
            'status' => 'required',
            'vehicle' => ['required', Rule::in(['motorcycle', 'car', 'bike'])],
            'address' => 'required',
        ];
    }
}
