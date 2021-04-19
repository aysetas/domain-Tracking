<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
        $logo="";
        if (request()->hasFile('site_logo')){
            $logo="mimes:jpeg,jpg,png";
        }
        return [
           "site_logo" => $logo,
            "site_title" => 'required',
            "site_desc" => 'required',
            "site_email" => 'required|email'
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
