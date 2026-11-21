@extends('layouts.app')
@section('title', 'Tags')
@section('content')

<!-- Header Banner -->
<div class="hero">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1.5rem">
        <div>
            <h1>
                <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">label</span>
                <span>Daftar Tags</span>
            </h1>
            <p>Kelola label kata kunci untuk memudahkan pencarian dan pengelompokan tulisan.</p>
        </div>
        <div>
            <a class="btn primary" href="{{ route('tags.create') }}" style="box-shadow:var(--md-elevation-2)">
                <span class="material-symbols-outlined">new_label</span>
                <span>Tambah Tag</span>
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
                    <th>Nama Tag</th>
                    <th>Slug URL</th>
                    <th>Jumlah Post Terkait</th>
                    <th style="text-align:right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $item)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:.5rem;font-weight:600">
                            <span class="badge" style="font-size:.85rem;padding:.3rem .75rem">
                                #{{ $item->name }}
                            </span>
                        </div>
                    </td>
                    <td><code>{{ $item->slug }}</code></td>
                    <td>
                        <span class="badge" style="background:var(--md-sys-color-surface-container-high);font-size:.78rem">
                            {{ $item->posts_count }} post
                        </span>
                    </td>
                    <td style="text-align:right">
                        <a class="btn tonal" href="{{ route('tags.edit', $item) }}" style="padding:.3rem .75rem;font-size:.8rem">
                            <span class="material-symbols-outlined" style="font-size:15px">edit</span>
                            <span>Ubah</span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:2.5rem 1rem;color:var(--md-sys-color-on-surface-variant)">
                        <span class="material-symbols-outlined" style="font-size:40px;opacity:.5;display:block;margin-bottom:.5rem">label_off</span>
                        <p style="margin-bottom:.75rem">Belum ada tags yang dibuat.</p>
                        <a class="btn primary" href="{{ route('tags.create') }}">+ Tambah Tag Pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:1.5rem;display:flex;justify-content:center">
        {{ $tags->links() }}
    </div>
</div>

@endsection
