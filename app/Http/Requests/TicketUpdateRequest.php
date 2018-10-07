<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'process' => 'required|exists:processes,id',
            'status' => 'required|exists:statuses,id',
            'furniture' => 'required',
        ];
    }
}
