<?php


namespace App\Http\request\Venue;


use Illuminate\Foundation\Http\FormRequest;

class CreateVenueRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'address' => 'required|min:3|max:100',
        ];
    }
}
