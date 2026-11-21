@extends('layouts.app')
@section('title', 'Ubah Kategori')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">edit</span>
        <span>Ubah Kategori</span>
    </h1>
    <p>Memperbarui kategori: <strong>{{ $category->name }}</strong></p>
</div>

<div class="card" style="max-width:36rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">folder</span>
                <span>Nama Kategori <span style="color:var(--md-sys-color-error)">*</span></span>
            </span>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required autofocus>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">link</span>
                <span>Slug URL</span>
            </span>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}">
        </label>

        <div style="display:flex;align-items:center;gap:1rem;margin-top:1.75rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant);flex-wrap:wrap">
            <button class="btn primary" type="submit">
                <span class="material-symbols-outlined">save</span>
                <span>Perbarui Kategori</span>
            </button>
            <a class="btn" href="{{ route('categories.index') }}">Batal</a>
        </div>
    </form>

    <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px dashed var(--md-sys-color-outline-variant);display:flex;align-items:center;justify-content:space-between">
        <div>
            <div style="font-weight:600;font-size:.9rem;color:var(--md-sys-color-error)">Hapus Kategori</div>
            <div style="font-size:.8rem;color:var(--md-sys-color-on-surface-variant)">Tindakan ini tidak dapat dibatalkan.</div>
        </div>
        <form method="POST" action="{{ route('categories.destroy', $category) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
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
