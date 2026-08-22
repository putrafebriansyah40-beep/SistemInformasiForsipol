<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() && $this->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_rapat' => ['required', 'string', 'max:255'],
            'agenda' => ['nullable', 'string'],
            'waktu_rapat' => ['required', 'date'],
            'lokasi' => ['nullable', 'string', 'max:255'],
        ];
    }
}
