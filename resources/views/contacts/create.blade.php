@extends('layouts.app')
@section('title', 'Tambah Kontak')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">person_add</span>
        <span>Tambah Kontak Baru</span>
    </h1>
    <p>Tambahkan entri data baru ke buku alamat.</p>
</div>

<div class="card" style="max-width:38rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
        @include('contacts._form', ['submitLabel' => 'Simpan Kontak'])
        <div style="margin-top:1rem">
            @include('layouts._autofill', ['presets' => [
                ['fields' => ['name' => 'Budi Santoso', 'email' => 'budi.santoso@contoh.test', 'phone' => '__RANDOM_PHONE__', 'address' => 'Jl. Merdeka No. 45, Pekanbaru']],
                ['fields' => ['name' => 'Siti Rahayu', 'email' => 'siti.rahayu@contoh.test', 'phone' => '__RANDOM_PHONE__', 'address' => 'Jl. Sudirman No. 12, Pekanbaru']],
                ['fields' => ['name' => 'Agus Wijaya', 'email' => 'agus.wijaya@contoh.test', 'phone' => '__RANDOM_PHONE__', 'address' => 'Jl. Hangtuah No. 8, Pekanbaru']],
                ['fields' => ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@contoh.test', 'phone' => '__RANDOM_PHONE__', 'address' => 'Jl. Cut Nyak Dien No. 21, Pekanbaru']],
            ]])
        </div>
    </form>
</div>

@endsection
