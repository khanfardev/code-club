<?php


namespace App\Http\request\question;


use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id'   => [
                'required',
                'integer',
            ],
            'question_text' => [
                'required',
            ],
        ];
    }
}
