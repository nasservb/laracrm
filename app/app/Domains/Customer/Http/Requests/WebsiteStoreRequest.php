<?php

namespace App\Domains\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'string|min:3|max:120|required',
            'description' => 'string|max:1024|nullable',
        ];
    }
}
