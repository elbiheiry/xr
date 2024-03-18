<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
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
            'image1' => ['image' , 'max:2048' , 'mimes:png,jpg,jpeg'],            
            'title1_en' => ['required' , 'string' , 'max:255'],
            'title1_ar' => ['required' , 'string' , 'max:255'],
            'description1_en' => ['required'],
            'description1_ar' => ['required'],
            'image2' => ['image' , 'max:2048' , 'mimes:png,jpg,jpeg'],
            'title2_en' => ['required' , 'string' , 'max:255'],
            'title2_ar' => ['required' , 'string' , 'max:255'],
            'description2_en' => ['required'],
            'description2_ar' => ['required'],
            'title3_en' => ['required' , 'string' , 'max:255'],
            'title3_ar' => ['required' , 'string' , 'max:255'],
            'description3_en' => ['required'],
            'description3_ar' => ['required'],
            'title4_en' => ['required' , 'string' , 'max:255'],
            'title4_ar' => ['required' , 'string' , 'max:255'],
            'description4_en' => ['required'],
            'description4_ar' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'image1' => 'About us image',
            'title1_en' => 'About us title (EN)',
            'title1_ar' => 'About us title (AR)',
            'description1_en' => 'About us description (EN)',
            'description1_ar' => 'About us description (AR)',
            'image2' => 'About us second image',
            'title2_en' => 'our vision title (EN)',
            'title2_ar' => 'our vision title (AR)',
            'description2_en' => 'our vision description (EN)',
            'description2_ar' => 'our vision description (AR)',
            'title3_en' => 'our mission title (EN)',
            'title3_ar' => 'our mission title (AR)',
            'description3_en' => 'our mission description (EN)',
            'description3_ar' => 'our mission description (AR)',
            'title4_en' => 'work process title (EN)',
            'title4_ar' => 'work process title (AR)',
            'description4_en' => 'work process description (EN)',
            'description4_ar' => 'work process description (AR)'
        ];
    }
}
