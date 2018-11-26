<?php

namespace App\Http\Requests\Admin\Request;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiRequest;

class UserRequest extends ApiRequest
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
            'appId'=>'required|exists:apps,id',
            'deviceId'=>'required',
            'country'=>'required',
            'deviceType'=>'required',
            'osVersion'=>'required',
            'appVersion'=>'required'

        ];
    }
}
