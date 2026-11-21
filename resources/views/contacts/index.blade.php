@extends('layouts.app')
@section('title', 'Daftar Kontak')
@section('content')

<!-- Header Banner -->
<div class="hero">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1.5rem">
        <div>
            <h1>
                <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">contact_phone</span>
                <span>Daftar Kontak</span>
            </h1>
            <p>Buku alamat dan direktori kontak terintegrasi.</p>
        </div>
        <div>
            <a class="btn primary" href="{{ route('contacts.create') }}" style="box-shadow:var(--md-elevation-2)">
                <span class="material-symbols-outlined">person_add</span>
                <span>Tambah Kontak Baru</span>
            </a>
        </div>
    </div>
</div>

<!-- Table Card -->
<div class="card" style="border-radius:var(--md-radius-xl);padding:1.75rem">
    <div style="overflow-x:auto">
        <table>
            <thead>
                <tr>
                    <th style="width:60px">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th style="text-align:right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr>
                    <td>
                        @if($contact->avatarUrl())
                        <img src="{{ $contact->avatarUrl() }}" width="44" height="44" style="border-radius:var(--md-radius-full);object-fit:cover;display:block;box-shadow:var(--md-elevation-1)" alt="">
                        @else
                        <div style="width:44px;height:44px;border-radius:var(--md-radius-full);background:var(--md-sys-color-primary-container);color:var(--md-sys-color-on-primary-container);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.9rem">
                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                        </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('contacts.show', $contact) }}" style="font-weight:600;color:var(--md-sys-color-on-surface)">
                            {{ $contact->name }}
                        </a>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:.35rem;color:var(--md-sys-color-on-surface-variant)">
                            <span class="material-symbols-outlined" style="font-size:16px">mail</span>
                            <span>{{ $contact->email }}</span>
                        </div>
                    </td>
                    <td>
                        @if($contact->phone)
                        <div style="display:flex;align-items:center;gap:.35rem;color:var(--md-sys-color-on-surface-variant)">
                            <span class="material-symbols-outlined" style="font-size:16px">call</span>
                            <span>{{ $contact->phone }}</span>
                        </div>
                        @else
                        <span style="color:var(--md-sys-color-on-surface-variant);font-size:.85rem">—</span>
                        @endif
                    </td>
                    <td style="text-align:right">
                        <div style="display:inline-flex;gap:.5rem">
                            <a class="btn tonal" href="{{ route('contacts.show', $contact) }}" style="padding:.3rem .75rem;font-size:.8rem">
                                <span class="material-symbols-outlined" style="font-size:15px">visibility</span>
                                <span>Lihat</span>
                            </a>
                            <a class="btn" href="{{ route('contacts.edit', $contact) }}" style="padding:.3rem .75rem;font-size:.8rem">
                                <span class="material-symbols-outlined" style="font-size:15px">edit</span>
                                <span>Ubah</span>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:2.5rem 1rem;color:var(--md-sys-color-on-surface-variant)">
                        <span class="material-symbols-outlined" style="font-size:40px;opacity:.5;display:block;margin-bottom:.5rem">contacts</span>
                        <p style="margin-bottom:.75rem">Belum ada data kontak tersimpan.</p>
                        <a class="btn primary" href="{{ route('contacts.create') }}">+ Tambah Kontak Pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:1.5rem;display:flex;justify-content:center">
        {{ $contacts->links() }}
    </div>
</div>

@endsection
