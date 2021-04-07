<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
            "nama" => "required",
            "tanggal_lahir" => "required | date_format:Y-m-d",
            "gaji" => "required | numeric",
            "status_karyawan" => "required | boolean"
        ];
    }
}
