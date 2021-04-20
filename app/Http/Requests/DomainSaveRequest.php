<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainSaveRequest extends FormRequest
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
            'price' => 'required|numeric',
            'started_at' => 'required|date',
            'finished_at' => 'required|date'
        ];
    }
    public function attributes()
    {
        return [
            'price' => 'Fiyat',
            'started_at' => 'Başlangıç Tarihi',
            'finished_at' => 'Bitiş Tarihi'

        ];
    }
}
