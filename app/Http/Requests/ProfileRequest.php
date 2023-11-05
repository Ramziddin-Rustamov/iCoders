<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|max:20',
            'image' => 'max:10240|mimes:jpg,bmp,png',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'instagram' => 'nullable|url',
            'telegram' => 'nullable|url',
            'job' => 'nullable|string',
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'about_uz' => 'nullable|string',
        ];
    }
}
