<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $whatsapp_link = Setting::get('whatsapp_group_link', '');
        return view('admin.settings.index', compact('whatsapp_link'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp_group_link' => ['nullable', 'url', 'max:255'],
        ]);

        Setting::set('whatsapp_group_link', $request->whatsapp_group_link);

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
