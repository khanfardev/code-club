<?php


namespace App\Http\request\Ladder;


use Illuminate\Foundation\Http\FormRequest;

class CreateLadderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','max:255'],
            'description'=>['required','max:255'],
            'level_id'=>['required','max:255'],
        ];
    }
}
