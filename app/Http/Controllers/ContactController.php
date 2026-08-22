<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Mail::to('putrafebriansyah40@gmail.com')->send(new ContactMessage($request->all()));
            
            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dikirim.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan: ' . $e->getMessage()
            ], 500);
        }
    }
}
