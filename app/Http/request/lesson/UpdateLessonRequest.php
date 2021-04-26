<?php


namespace App\Http\request\lesson;


use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','max:255'],
            'description'=>['required','max:255'],
            'body'=>['required'],
            'image'=>[],
            'level_id'=>['required','max:255'],
            'topic_id'=>['required','max:255']
        ];
    }

}
