<?php

namespace App\Http\Requests\Bendahara;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CashPayment;

class StoreCashPaymentRequest extends FormRequest
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
            'user_id'       => ['required', 'exists:users,id'],
            'bulan'         => ['required', 'integer', 'between:1,12'],
            'tahun'         => ['required', 'integer', 'min:2020', 'max:2099'],
            'jumlah'        => ['required', 'integer', 'min:0'],
            'status'        => ['required', 'in:Lunas,Belum Lunas,Menunggu Konfirmasi'],
            'tanggal_bayar' => ['nullable', 'date'],
            'keterangan'    => ['nullable', 'string', 'max:500'],
        ];
    }
    
    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $exists = CashPayment::where('user_id', $this->user_id)
                ->where('bulan', $this->bulan)
                ->where('tahun', $this->tahun)
                ->exists();

            if ($exists) {
                $validator->errors()->add('bulan', 'Data kas untuk anggota ini pada bulan dan tahun tersebut sudah ada.');
            }
        });
    }
}
