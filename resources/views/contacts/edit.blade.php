@extends('layouts.app')
@section('title', 'Ubah Kontak')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">edit</span>
        <span>Ubah Kontak</span>
    </h1>
    <p>Memperbarui data kontak: <strong>{{ $contact->name }}</strong></p>
</div>

<div class="card" style="max-width:38rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ route('contacts.update', $contact) }}" enctype="multipart/form-data">
        @include('contacts._form', ['submitLabel' => 'Perbarui Kontak'])
    </form>
</div>

@endsection
