<?php

namespace App\Domains\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'firstName' => 'string|min:3|max:120|nullable|required_without:lastName',
            'lastName' => 'string|min:3|max:120|nullable|required_without:firstName',
            'phone'=>'string|min:5|max:20|nullable|required_without:email',
            'email'=>'string|min:5|max:20|nullable|email|required_without:phone',
            'desiredBudget'=>'int|min:0|max:1000000|required',
            'message' => 'string|max:1024|nullable',
        ];
    }
}
