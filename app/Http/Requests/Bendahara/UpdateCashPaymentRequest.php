<?php

namespace App\Http\Requests\Bendahara;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCashPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() && $this->user()->role === 'bendahara';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jumlah'        => ['required', 'integer', 'min:0'],
            'status'        => ['required', 'in:Lunas,Belum Lunas,Menunggu Konfirmasi'],
            'tanggal_bayar' => ['nullable', 'date'],
            'keterangan'    => ['nullable', 'string', 'max:500'],
        ];
    }
}
