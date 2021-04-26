<?php


namespace App\Http\request\option;


use Illuminate\Foundation\Http\FormRequest;

class CreateOptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'question_id' => [
                'required',
                'integer',
            ],
            'option_text' => [
                'required',
            ],
            'points'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }

}
