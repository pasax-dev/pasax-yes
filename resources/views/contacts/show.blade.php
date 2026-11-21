@extends('layouts.app')
@section('title', 'Kontak: ' . $contact->name)
@section('content')

<div style="max-width:38rem;margin:0 auto">
    <!-- Back Navigation -->
    <div style="margin-bottom:1.5rem">
        <a class="btn" href="{{ route('contacts.index') }}" style="font-size:.85rem;padding:.4rem .9rem">
            <span class="material-symbols-outlined" style="font-size:18px">arrow_back</span>
            <span>Kembali ke Daftar Kontak</span>
        </a>
    </div>

    <!-- Contact Profile Card -->
    <div class="card" style="border-radius:var(--md-radius-xl);padding:2.25rem;box-shadow:var(--md-elevation-2)">
        <div style="display:flex;align-items:center;gap:1.5rem;margin-bottom:1.75rem;flex-wrap:wrap">
            @if($contact->avatarUrl())
            <img src="{{ $contact->avatarUrl() }}" alt="avatar {{ $contact->name }}" width="96" height="96" style="border-radius:var(--md-radius-full);object-fit:cover;box-shadow:var(--md-elevation-2)">
            @else
            <div style="width:96px;height:96px;border-radius:var(--md-radius-full);background:var(--md-sys-color-primary-container);color:var(--md-sys-color-on-primary-container);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:2.25rem;font-family:var(--md-font-display)">
                {{ strtoupper(substr($contact->name, 0, 1)) }}
            </div>
            @endif

            <div>
                <h1 style="font-size:1.75rem;margin:0 0 .25rem">{{ $contact->name }}</h1>
                <span class="badge" style="background:var(--md-sys-color-surface-container-high);font-size:.8rem">
                    <span class="material-symbols-outlined" style="font-size:14px">badge</span>
                    <span>Kontak Tersimpan</span>
                </span>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:1rem;margin-bottom:2rem;background:var(--md-sys-color-surface-container-high);border-radius:var(--md-radius-lg);padding:1.25rem">
            <div style="display:flex;align-items:center;gap:.75rem">
                <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:22px">mail</span>
                <div>
                    <div style="font-size:.78rem;font-weight:600;color:var(--md-sys-color-on-surface-variant);text-transform:uppercase">Email</div>
                    <div style="font-weight:500">{{ $contact->email }}</div>
                </div>
            </div>

            <div style="display:flex;align-items:center;gap:.75rem">
                <span class="material-symbols-outlined" style="color:var(--md-sys-color-secondary);font-size:22px">call</span>
                <div>
                    <div style="font-size:.78rem;font-weight:600;color:var(--md-sys-color-on-surface-variant);text-transform:uppercase">Telepon</div>
                    <div style="font-weight:500">{{ $contact->phone ?: '—' }}</div>
                </div>
            </div>

            <div style="display:flex;align-items:center;gap:.75rem">
                <span class="material-symbols-outlined" style="color:var(--md-sys-color-tertiary);font-size:22px">location_on</span>
                <div>
                    <div style="font-size:.78rem;font-weight:600;color:var(--md-sys-color-on-surface-variant);text-transform:uppercase">Alamat</div>
                    <div style="font-weight:500">{{ $contact->address ?: '—' }}</div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant)">
            <div style="display:flex;gap:.75rem">
                <a class="btn primary" href="{{ route('contacts.edit', $contact) }}">
                    <span class="material-symbols-outlined">edit</span>
                    <span>Ubah Kontak</span>
                </a>
                <a class="btn" href="{{ route('contacts.index') }}">Daftar Kontak</a>
            </div>

            <form method="POST" action="{{ route('contacts.destroy', $contact) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                @csrf
                @method('DELETE')
                <button class="btn danger" type="submit">
                    <span class="material-symbols-outlined">delete</span>
                    <span>Hapus</span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
