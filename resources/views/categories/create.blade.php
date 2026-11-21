@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">create_new_folder</span>
        <span>Tambah Kategori Baru</span>
    </h1>
    <p>Buat kelompok topik baru untuk artikel blog.</p>
</div>

<div class="card" style="max-width:36rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">folder</span>
                <span>Nama Kategori <span style="color:var(--md-sys-color-error)">*</span></span>
            </span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Arsitektur Cloud" required autofocus>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">link</span>
                <span>Slug URL <span style="font-weight:400;color:var(--md-sys-color-on-surface-variant);font-size:.8rem">(otomatis bila kosong)</span></span>
            </span>
            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="arsitektur-cloud">
        </label>

        <div style="display:flex;align-items:center;gap:1rem;margin-top:1.75rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant);flex-wrap:wrap">
            <button class="btn primary" type="submit">
                <span class="material-symbols-outlined">save</span>
                <span>Simpan Kategori</span>
            </button>

            @include('layouts._autofill', ['presets' => [
                ['fields' => ['name' => 'Kuliner Nusantara']],
                ['fields' => ['name' => 'Fotografi Jalanan']],
                ['fields' => ['name' => 'Ulasan Buku']],
                ['fields' => ['name' => 'Berkebun Kota']],
                ['fields' => ['name' => 'Musik Indie']],
            ]])

            <a class="btn" href="{{ route('categories.index') }}" style="margin-left:auto">Batal</a>
        </div>
    </form>
</div>

@endsection
