<?php

namespace App\Http\Requests\Admin;

use App\Models\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingsRequest extends FormRequest
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
            'image' => ['image' , 'max:2048' , 'mimes:png,jpg,jpeg'],
            'map' => ['required'],
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'email' => ['required' , 'string' , 'email' , 'max:255'],
            'address_en' => ['required' , 'string' , 'max:255'],
            'address_ar' => ['required' , 'string' , 'max:255'],
            'description_en' => ['required'],
            'description_ar' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Contact us image',
            'map' => 'Map link',
            'phone' => 'Phone number',
            'whatsapp' => 'Whatsapp number',
            'email' => 'Contact email',
            'address_en' => 'Address (EN)',
            'address_ar' => 'Address (AR)',
            'description_en' => 'Description (EN)',
            'description_ar' => 'Description (AR)'
        ];
    }

    public function update()
    {
        $settings = Setting::firstOrFail();

        $data = [
            'en' => [
                'address' => $this->address_en,
                'description' => $this->description_en
            ],
            'ar' => [
                'address' => $this->address_ar,
                'description' => $this->description_ar
            ],
            'phone' => $this->phone,
            'map' => $this->map,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email
        ];

        if ($this->image) {
            image_delete($settings->image , 'settings');
            $data['image'] = image_manipulate($this->image , 'settings' , 546 , 557);
        }

        $settings->update($data);
    }
}
