<?php

namespace App\Http\Requests\Bulletins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->bulletin);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'country' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'min:11', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'end_date' => ['required', 'date'],
            'image' => ['nullable', 'image:jpeg,jpg,png', 'max:100000'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
        ];
    }
}
