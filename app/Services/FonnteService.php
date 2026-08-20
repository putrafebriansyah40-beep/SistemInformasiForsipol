<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FonnteService
{
    protected $token;

    public function __construct()
    {
        $this->token = env('FONNTE_TOKEN', '');
    }

    /**
     * Kirim pesan WhatsApp melalui API Fonnte.
     *
     * @param string $target Nomor HP tujuan (misal: '08123456789' atau '628123456789')
     * @param string $message Isi pesan yang akan dikirim
     * @return bool
     */
    public function sendMessage(string $target, string $message): bool
    {
        if (empty($this->token)) {
            Log::warning('Fonnte token is missing. Simulating WhatsApp OTP sending.');
            Log::info("WhatsApp Message to $target: \n$message");
            return true;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $target,
                'message' => $message,
                'countryCode' => '62', // Default kode negara Indonesia
            ]);

            if ($response->successful()) {
                $result = $response->json();
                if (isset($result['status']) && $result['status'] == true) {
                    return true;
                }
                Log::error('Fonnte API returned error: ' . json_encode($result));
            } else {
                Log::error('Fonnte API request failed with status: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Error sending WhatsApp message via Fonnte: ' . $e->getMessage());
        }

        return false;
    }
}
