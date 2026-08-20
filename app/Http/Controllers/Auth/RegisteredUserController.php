<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'whatsapp' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otpCode = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_whatsapp' => $request->whatsapp,
            'password' => Hash::make($request->password),
            'role' => 'member',
            'jabatan' => 'Anggota',
            'otp_code' => $otpCode,
            'otp_expires_at' => now()->addMinutes(10),
            'is_verified' => false,
        ]);

        // Send OTP via WhatsApp
        $fonnteService = new \App\Services\FonnteService();
        $message = "*FORSIPOL PNP*\n\nKode OTP Anda adalah: *$otpCode*\n\nKode ini berlaku selama 10 menit. Jangan berikan kode ini kepada siapapun.";
        $fonnteService->sendMessage($user->no_whatsapp, $message);

        Auth::login($user);

        return redirect(route('otp.verify', absolute: false));
    }
}
