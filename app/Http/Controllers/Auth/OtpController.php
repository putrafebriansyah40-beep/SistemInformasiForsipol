<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function show()
    {
        if (Auth::user()->is_verified) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $user = Auth::user();

        if ($user->is_verified) {
            return redirect()->route('dashboard');
        }

        if (now()->gt($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP telah kedaluwarsa. Silakan minta kode baru.']);
        }

        if ($request->otp !== $user->otp_code) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
        }

        $user->update([
            'is_verified' => true,
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        return redirect()->route('dashboard')->with('status', 'Akun berhasil diverifikasi!');
    }

    public function resend(Request $request)
    {
        $user = Auth::user();

        if ($user->is_verified) {
            return redirect()->route('dashboard');
        }

        // Rate limiting (prevent spam)
        if ($user->otp_expires_at && now()->diffInSeconds($user->otp_expires_at) > (10 * 60 - 60)) {
            return back()->with('error', 'Tunggu 1 menit sebelum meminta kode baru.');
        }

        $otpCode = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        $user->update([
            'otp_code' => $otpCode,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        $fonnteService = new \App\Services\FonnteService();
        $message = "*FORSIPOL PNP*\n\nKode OTP Anda yang baru adalah: *$otpCode*\n\nKode ini berlaku selama 10 menit. Jangan berikan kode ini kepada siapapun.";
        $fonnteService->sendMessage($user->no_whatsapp, $message);

        return back()->with('status', 'Kode OTP baru telah dikirim ke WhatsApp Anda.');
    }
}
