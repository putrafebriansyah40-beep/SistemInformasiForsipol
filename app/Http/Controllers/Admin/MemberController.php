<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\StoreMemberRequest;
use App\Http\Requests\Admin\UpdateMemberRequest;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')->latest()->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();
        
        $user = new User($validated);
        $user->role = 'member';
        $user->password = Hash::make($validated['password']);
        $user->is_verified = true;
        $user->save();

        return redirect()->route('admin.members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(User $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(UpdateMemberRequest $request, User $member)
    {
        $validated = $request->validated();

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $member->update($validated);

        return redirect()->route('admin.members.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(User $member)
    {
        $member->delete();

        return redirect()->route('admin.members.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }

    public function export()
    {
        $users = User::all();
        
        $filename = "data_anggota_" . date('Y-m-d') . ".csv";
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = [
            'No', 'Nama', 'NIM', 'Email', 'No WhatsApp', 'Jenis Kelamin', 
            'Role', 'Jabatan', 'Departemen', 'Angkatan', 'Status Verifikasi', 'Tanggal Bergabung'
        ];

        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8 to help Excel recognize the encoding correctly
            fputs($file, "\xEF\xBB\xBF");
            
            // Use semicolon delimiter which is standard for Excel in Indonesia
            fputcsv($file, $columns, ';');

            $no = 1;
            foreach ($users as $user) {
                $row = [
                    $no++,
                    $user->name,
                    $user->nim,
                    $user->email,
                    $user->no_whatsapp ?? '-',
                    $user->jenis_kelamin == 'L' ? 'Laki-laki' : ($user->jenis_kelamin == 'P' ? 'Perempuan' : '-'),
                    $user->role,
                    $user->jabatan ?? '-',
                    $user->departemen ?? '-',
                    $user->angkatan ?? '-',
                    $user->is_verified ? 'Terverifikasi' : 'Belum Verifikasi',
                    $user->created_at ? $user->created_at->format('Y-m-d') : '-'
                ];

                fputcsv($file, $row, ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
