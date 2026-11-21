@extends('layouts.app')
@section('title', 'Ubah Tag')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">edit</span>
        <span>Ubah Tag</span>
    </h1>
    <p>Memperbarui label kata kunci: <strong>#{{ $tag->name }}</strong></p>
</div>

<div class="card" style="max-width:36rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ route('tags.update', $tag) }}">
        @csrf
        @method('PUT')

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">label</span>
                <span>Nama Tag <span style="color:var(--md-sys-color-error)">*</span></span>
            </span>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}" required autofocus>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">link</span>
                <span>Slug URL</span>
            </span>
            <input type="text" name="slug" value="{{ old('slug', $tag->slug) }}">
        </label>

        <div style="display:flex;align-items:center;gap:1rem;margin-top:1.75rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant);flex-wrap:wrap">
            <button class="btn primary" type="submit">
                <span class="material-symbols-outlined">save</span>
                <span>Perbarui Tag</span>
            </button>
            <a class="btn" href="{{ route('tags.index') }}">Batal</a>
        </div>
    </form>

    <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px dashed var(--md-sys-color-outline-variant);display:flex;align-items:center;justify-content:space-between">
        <div>
            <div style="font-weight:600;font-size:.9rem;color:var(--md-sys-color-error)">Hapus Tag</div>
            <div style="font-size:.8rem;color:var(--md-sys-color-on-surface-variant)">Tindakan ini tidak dapat dibatalkan.</div>
        </div>
        <form method="POST" action="{{ route('tags.destroy', $tag) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tag ini?')">
            @csrf
            @method('DELETE')
            <button class="btn danger" type="submit">
                <span class="material-symbols-outlined" style="font-size:16px">delete</span>
                <span>Hapus</span>
            </button>
        </form>
    </div>
</div>

@endsection
