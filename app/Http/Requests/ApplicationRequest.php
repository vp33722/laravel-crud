<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'app_platform_id'  => 'required',
            
              ];
    }

    public function messages()
    {

        return
            [
            'app_platform_id.required' => 'Please Enter Your Plateform Id',
          
        ];
    }
}
