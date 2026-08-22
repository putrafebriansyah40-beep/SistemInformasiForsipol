<x-mail::message>
# Pesan Baru dari Form Kontak

Anda menerima pesan baru dari form kontak di website.

**Nama Lengkap:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  
**Subjek:** {{ $data['subject'] }}  

**Pesan:**
{{ $data['message'] }}

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
