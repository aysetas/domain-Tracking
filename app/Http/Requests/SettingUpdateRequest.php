<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * @var mixed
     */


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
            "site_title" => 'required',
            "site_email" => 'required|email',
            "site_desc" => 'nullable'
        ];

    }

    public function attributes()
    {
        return[
            'site_logo' => 'Logo',
            'site_title' => 'Başlık',
            'site_desc' => 'Açıklama',
            'site_email' => 'Email'
        ];
    }
}
