<?php


namespace App\Http\request\Event;


use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'venue_id' => 'required',
            'start_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],

        ];
    }

}
