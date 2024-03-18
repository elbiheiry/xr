<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomeRequest extends FormRequest
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
            //first section
            'image' => ['image' , 'max:2048' , 'mimes:png,jpg,jpeg'],            
            'title1_en' => ['required' , 'string' , 'max:255'],
            'title1_ar' => ['required' , 'string' , 'max:255'],
            'description1_en' => ['required'],
            'description1_ar' => ['required'],
            //solutions section
            'title2_en' => ['required' , 'string' , 'max:255'],
            'title2_ar' => ['required' , 'string' , 'max:255'],
            'description2_en' => ['required'],
            'description2_ar' => ['required'],
            //article section
            'title3_en' => ['required' , 'string' , 'max:255'],
            'title3_ar' => ['required' , 'string' , 'max:255'],
            //team section
            'title4_en' => ['required' , 'string' , 'max:255'],
            'title4_ar' => ['required' , 'string' , 'max:255'],
            'description4_en' => ['required'],
            'description4_ar' => ['required'],
            //testimonials section
            'title5_en' => ['required' , 'string' , 'max:255'],
            'title5_ar' => ['required' , 'string' , 'max:255'],
            'description5_en' => ['required'],
            'description5_ar' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            //first section
            'image' => 'First section image',
            'title1_en' => 'First section title (EN)',
            'title1_ar' => 'First section title (AR)',
            'description1_en' => 'First section description (EN)',
            'description1_ar' => 'First section description (AR)',
            //solutions section
            'title2_en' => 'solutions section title (EN)',
            'title2_ar' => 'solutions section title (AR)',
            'description2_en' => 'solutions section description (EN)',
            'description2_ar' => 'solutions section description (AR)',
            //article section
            'title3_en' => 'Article section title (EN)',
            'title3_ar' => 'Article section title (AR)',
            //team section
            'title4_en' => 'Team member section title (EN)',
            'title4_ar' => 'Team member section title (AR)',
            'description4_en' => 'Team member section description (EN)',
            'description4_ar' => 'Team member section description (AR)',
            //testimonials section
            'title5_en' => 'Testimonials section title (EN)',
            'title5_ar' => 'Testimonials section title (AR)',
            'description5_en' => 'Testimonials section description (EN)',
            'description5_ar' => 'Testimonials section description (AR)'
        ];
    }
}
