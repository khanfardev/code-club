<?php


namespace App\Http\request\level;

use App\Models\Level;
use Illuminate\Foundation\Http\FormRequest;

class CreateLevelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
           'name'=>['required','max:255']
        ];
    }
}
