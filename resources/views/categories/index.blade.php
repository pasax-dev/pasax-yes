@extends('layouts.app')
@section('title', 'Kategori')
@section('content')

<!-- Header Banner -->
<div class="hero">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1.5rem">
        <div>
            <h1>
                <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">folder</span>
                <span>Daftar Kategori</span>
            </h1>
            <p>Kelola topik dan pengelompokan tulisan blog.</p>
        </div>
        <div>
            <a class="btn primary" href="{{ route('categories.create') }}" style="box-shadow:var(--md-elevation-2)">
                <span class="material-symbols-outlined">create_new_folder</span>
                <span>Tambah Kategori</span>
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
                    <th>Nama Kategori</th>
                    <th>Slug URL</th>
                    <th>Jumlah Post</th>
                    <th style="text-align:right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $item)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:.6rem;font-weight:600">
                            <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:20px">folder_open</span>
                            <span>{{ $item->name }}</span>
                        </div>
                    </td>
                    <td><code>{{ $item->slug }}</code></td>
                    <td>
                        <span class="badge cat" style="font-size:.78rem">
                            {{ $item->posts_count }} post
                        </span>
                    </td>
                    <td style="text-align:right">
                        <a class="btn tonal" href="{{ route('categories.edit', $item) }}" style="padding:.3rem .75rem;font-size:.8rem">
                            <span class="material-symbols-outlined" style="font-size:15px">edit</span>
                            <span>Ubah</span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:2.5rem 1rem;color:var(--md-sys-color-on-surface-variant)">
                        <span class="material-symbols-outlined" style="font-size:40px;opacity:.5;display:block;margin-bottom:.5rem">folder_off</span>
                        <p style="margin-bottom:.75rem">Belum ada kategori yang dibuat.</p>
                        <a class="btn primary" href="{{ route('categories.create') }}">+ Tambah Kategori Pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:1.5rem;display:flex;justify-content:center">
        {{ $categories->links() }}
    </div>
</div>

@endsection
