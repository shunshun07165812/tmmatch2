<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'gender'=>['required'],
            'age'=>['required'],
            'address'=>['required'],
            'self_introduction'=>['required'],
            'profile_image' => ['file', 'mimes:jpeg,jpg,png',
                        'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'],
        ];
    }
}
