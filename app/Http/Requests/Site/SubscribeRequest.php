<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubscribeRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first() , 400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required' , 'string' , 'email' , 'max:255' , 'unique:subscribers,email']
        ];
    }

    public function attribtues()
    {
        return [
            'email' => app()->getLocale() == 'en' ? 'Email' : 'البريد الإلكتروني'
        ];
    }
}
