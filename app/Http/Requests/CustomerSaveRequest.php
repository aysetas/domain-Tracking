<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerSaveRequest extends FormRequest
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
            'full_name'=>'required|min:3|max:100',
            'email'=>'required|min:3|max:100',
            'phone'=>'required|min:3|max:50',
        ];
    }
    public function attributes()
    {
        return [
            'full_name'=>'Ad Soyad',
            'phone'=>'Telefon'
        ];
    }
}
