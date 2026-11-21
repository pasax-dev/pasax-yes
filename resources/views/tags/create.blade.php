@extends('layouts.app')
@section('title', 'Tambah Tag')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">new_label</span>
        <span>Tambah Tag Baru</span>
    </h1>
    <p>Buat label kata kunci baru untuk menandai artikel.</p>
</div>

<div class="card" style="max-width:36rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ route('tags.store') }}">
        @csrf

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">label</span>
                <span>Nama Tag <span style="color:var(--md-sys-color-error)">*</span></span>
            </span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Keamanan Web" required autofocus>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">link</span>
                <span>Slug URL <span style="font-weight:400;color:var(--md-sys-color-on-surface-variant);font-size:.8rem">(otomatis bila kosong)</span></span>
            </span>
            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="keamanan-web">
        </label>

        <div style="display:flex;align-items:center;gap:1rem;margin-top:1.75rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant);flex-wrap:wrap">
            <button class="btn primary" type="submit">
                <span class="material-symbols-outlined">save</span>
                <span>Simpan Tag</span>
            </button>

            @include('layouts._autofill', ['presets' => [
                ['fields' => ['name' => 'Resep Harian']],
                ['fields' => ['name' => 'Jalan-Jalan']],
                ['fields' => ['name' => 'Ulasan Film']],
                ['fields' => ['name' => 'Tips Produktif']],
                ['fields' => ['name' => 'Komunitas']],
            ]])

            <a class="btn" href="{{ route('tags.index') }}" style="margin-left:auto">Batal</a>
        </div>
    </form>
</div>

@endsection
