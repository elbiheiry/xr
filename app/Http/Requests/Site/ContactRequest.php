<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'email' , 'max:255'],
            'phone' => ['required'],
            'message' => ['required'],
            'g-recaptcha-response' => ['required' , 'recaptcha']
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.recaptcha' => app()->getLocale() == 'en' ? 'Captcha verification failed' : 'لم تقم بالاجابه بشكل صحيح',
            'g-recaptcha-response.required' => app()->getLocale() == 'en' ? 'Please complete the captcha' : 'برجاء اكمال الاختبار'
        ]
    };

    public function attributes()
    {
        return [
            'name' => app()->getLocale() == 'en' ? 'Your name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Your Email' : 'البريد الإلكتروني',
            'phone' => app()->getLocale() == 'en' ? 'Your Phone' : 'رقم هاتفك',
            'message' => app()->getLocale() == 'en' ? 'Your message' : 'رسالتك'
        ];
    }
}
