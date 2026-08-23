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
            'nim' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'jenis_kelamin' => ['required', 'string', 'in:Ikhwan,Akhwat'],
            'jurusan' => ['required', 'string', 'max:255'],
            'program_studi' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'whatsapp' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'program_studi' => $request->program_studi,
            'email' => $request->email,
            'no_whatsapp' => $request->whatsapp,
            'password' => Hash::make($request->password),
            'role' => 'calon_anggota',
            'jabatan' => 'Calon Anggota',
            'otp_code' => null,
            'otp_expires_at' => null,
            'is_verified' => true,
        ]);

        return redirect(route('login'))->with('status', 'Registrasi berhasil! Silakan login untuk melanjutkan sebagai calon anggota.');
    }
}
