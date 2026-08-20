@extends('layouts.landing')

@section('content')

    {{-- Hero Section --}}
    @include('sections.hero')

    {{-- Tentang Kami Section --}}
    @include('sections.tentang')

    {{-- Visi & Misi Section --}}
    @include('sections.visi-misi')

    {{-- Struktur Kepengurusan Section --}}
    @include('sections.struktur')

    {{-- Program Kerja Section --}}
    @include('sections.program')

    {{-- Galeri Section --}}
    @include('sections.galeri')

    {{-- Kontak Section --}}
    @include('sections.kontak')

@endsection
