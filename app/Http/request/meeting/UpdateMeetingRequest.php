<?php


namespace App\Http\request\meeting;


use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'attendees' => 'required',
            'start_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],

        ];
    }
}
