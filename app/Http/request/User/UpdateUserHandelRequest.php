<?php


namespace App\Http\request\User;


use Illuminate\Foundation\Http\FormRequest;

class UpdateUserHandelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'handel' => 'required|min:3|max:100',
        ];
    }
}
