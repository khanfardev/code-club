<?php


namespace App\Http\request\level;


use Illuminate\Foundation\Http\FormRequest;

class UpdateLevelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','max:255']
        ];
    }
}
