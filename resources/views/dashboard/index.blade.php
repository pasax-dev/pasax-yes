@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- Header Banner -->
<div class="hero">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1.5rem">
        <div>
            <h1>
                <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">space_dashboard</span>
                <span>Dashboard Ringkasan</span>
            </h1>
            <p>Pusat kendali konten blog, kategori, tags, dan entri kontak.</p>
        </div>
        <div style="display:flex;gap:.75rem;flex-wrap:wrap">
            <a class="btn primary" href="{{ route('posts.create') }}" style="box-shadow:var(--md-elevation-2)">
                <span class="material-symbols-outlined">add</span>
                <span>Tulis Post Baru</span>
            </a>
            <a class="btn tonal" href="{{ route('pasax') }}">
                <span class="material-symbols-outlined">security</span>
                <span>Pasax Monitor</span>
            </a>
        </div>
    </div>
</div>

<!-- M3 Stat Cards Grid -->
<div class="grid">
    <div class="stat">
        <div style="display:flex;align-items:center;justify-content:space-between">
            <span class="muted">Total Posts</span>
            <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:24px">article</span>
        </div>
        <b>{{ $postCount }}</b>
    </div>

    <div class="stat">
        <div style="display:flex;align-items:center;justify-content:space-between">
            <span class="muted">Kategori</span>
            <span class="material-symbols-outlined" style="color:var(--md-sys-color-secondary);font-size:24px">folder</span>
        </div>
        <b>{{ $categoryCount }}</b>
    </div>

    <div class="stat">
        <div style="display:flex;align-items:center;justify-content:space-between">
            <span class="muted">Tags</span>
            <span class="material-symbols-outlined" style="color:var(--md-sys-color-tertiary);font-size:24px">label</span>
        </div>
        <b>{{ $tagCount }}</b>
    </div>

    <div class="stat">
        <div style="display:flex;align-items:center;justify-content:space-between">
            <span class="muted">Kontak</span>
            <span class="material-symbols-outlined" style="color:#eab308;font-size:24px">contact_phone</span>
        </div>
        <b>{{ $contactCount }}</b>
    </div>
</div>

<!-- Latest Posts Table Card -->
<div class="card" style="border-radius:var(--md-radius-xl);padding:1.75rem">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;flex-wrap:wrap;gap:1rem">
        <div style="display:flex;align-items:center;gap:.5rem">
            <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:22px">history</span>
            <h2 style="font-size:1.3rem">Post Terbaru</h2>
        </div>
        <a class="btn tonal" href="{{ route('posts.index') }}" style="font-size:.85rem;padding:.35rem .85rem">
            <span>Lihat Semua Post</span>
            <span class="material-symbols-outlined" style="font-size:16px">arrow_forward</span>
        </a>
    </div>

    <div style="overflow-x:auto">
        <table>
            <thead>
                <tr>
                    <th style="width:70px">Sampul</th>
                    <th>Judul Artikel</th>
                    <th>Kategori</th>
                    <th>Tags</th>
                    <th style="text-align:right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestPosts as $p)
                <tr>
                    <td>
                        @if($p->thumbnailUrl())
                        <img src="{{ $p->thumbnailUrl() }}" width="56" height="42" style="border-radius:var(--md-radius-sm);object-fit:cover;display:block;box-shadow:var(--md-elevation-1)" alt="">
                        @else
                        <div style="width:56px;height:42px;border-radius:var(--md-radius-sm);background:var(--md-sys-color-surface-container-high);display:flex;align-items:center;justify-content:center;color:var(--md-sys-color-on-surface-variant)">
                            <span class="material-symbols-outlined" style="font-size:20px;opacity:.6">image</span>
                        </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $p) }}" style="font-weight:600;color:var(--md-sys-color-on-surface);display:block">
                            {{ $p->title }}
                        </a>
                        <span class="meta" style="font-size:.78rem">
                            {{ $p->created_at->format('d M Y') }} · {{ $p->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td>
                        @if($p->category)
                        <span class="badge cat" style="font-size:.75rem">
                            <span class="material-symbols-outlined" style="font-size:13px">folder</span>
                            <span>{{ $p->category->name }}</span>
                        </span>
                        @else
                        <span style="color:var(--md-sys-color-on-surface-variant);font-size:.85rem">—</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:.25rem;flex-wrap:wrap">
                            @forelse($p->tags as $t)
                            <span class="badge" style="font-size:.7rem">#{{ $t->name }}</span>
                            @empty
                            <span style="color:var(--md-sys-color-on-surface-variant);font-size:.85rem">—</span>
                            @endforelse
                        </div>
                    </td>
                    <td style="text-align:right">
                        <div style="display:inline-flex;gap:.5rem">
                            <a class="btn tonal" href="{{ route('posts.edit', $p) }}" style="padding:.3rem .7rem;font-size:.8rem">
                                <span class="material-symbols-outlined" style="font-size:15px">edit</span>
                                <span>Ubah</span>
                            </a>
                            <a class="btn" href="{{ route('posts.show', $p) }}" style="padding:.3rem .7rem;font-size:.8rem">
                                <span class="material-symbols-outlined" style="font-size:15px">visibility</span>
                                <span>Lihat</span>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:2.5rem 1rem;color:var(--md-sys-color-on-surface-variant)">
                        <span class="material-symbols-outlined" style="font-size:40px;opacity:.5;display:block;margin-bottom:.5rem">article</span>
                        <p style="margin-bottom:.75rem">Belum ada post yang dibuat.</p>
                        <a class="btn primary" href="{{ route('posts.create') }}">+ Buat Post Pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
