<?php


namespace App\Http\request\topic;


use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','max:255'],
            'description'=>['required','max:255'],
            'level_id'=>['required','max:255'],
            'image'=>[]
        ];
    }
}
