@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

<!-- Hero Section (Material Design 3) -->
<div class="hero">
    <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:.75rem">
        <span class="badge" style="background:var(--md-sys-color-primary-container);color:var(--md-sys-color-on-primary-container);border-color:transparent">
            <span class="material-symbols-outlined" style="font-size:16px">verified</span>
            <span>Eksplorasi & Lab Keamanan</span>
        </span>
    </div>
    <h1>
        <span>Wawasan Teknologi, WAF & Laravel</span>
    </h1>
    <p>Catatan mendalam seputar arsitektur web modern, keamanan aplikasi, pencegahan eksploitasi, dan praktik terbaik Laravel.</p>
</div>

<!-- Featured Post (Sorotan) -->
@if($featured !== null)
<div style="margin-bottom:2.5rem">
    <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:1rem">
        <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:22px">star</span>
        <h2 style="font-size:1.35rem">Artikel Sorotan</h2>
    </div>

    <article class="card" style="padding:1.5rem;display:flex;gap:2rem;flex-wrap:wrap;align-items:center;border-radius:var(--md-radius-xl)">
        <a href="{{ route('posts.show', $featured) }}" style="flex:1 1 320px;overflow:hidden;border-radius:var(--md-radius-lg);box-shadow:var(--md-elevation-1);display:block">
            @include('layouts._cover', [
                'url' => $featured->thumbnailUrl(),
                'title' => $featured->title,
                'style' => 'width:100%;height:100%;min-height:220px;max-height:290px;object-fit:cover;display:block;transition:transform .3s ease',
                'loading' => 'eager'
            ])
        </a>

        <div style="flex:2 1 360px;display:flex;flex-direction:column;gap:.75rem">
            <div style="display:flex;align-items:center;gap:.5rem;flex-wrap:wrap">
                <span class="badge" style="background:var(--md-sys-color-primary-container);color:var(--md-sys-color-on-primary-container);border-color:transparent">
                    <span class="material-symbols-outlined" style="font-size:15px">auto_awesome</span>
                    <span>Sorotan Utama</span>
                </span>
                @if($featured->category)
                <span class="badge cat">
                    <span class="material-symbols-outlined" style="font-size:15px">folder</span>
                    <span>{{ $featured->category->name }}</span>
                </span>
                @endif
            </div>

            <h2 style="font-size:1.65rem;line-height:1.3;margin:0">
                <a href="{{ route('posts.show', $featured) }}" style="color:var(--md-sys-color-on-surface)">{{ $featured->title }}</a>
            </h2>

            @if($featured->excerpt)
            <p style="color:var(--md-sys-color-on-surface-variant);font-size:1rem;line-height:1.6;margin:0">{{ $featured->excerpt }}</p>
            @endif

            <div class="meta" style="margin-top:.25rem">
                <span class="material-symbols-outlined" style="font-size:16px">calendar_today</span>
                <span>{{ $featured->created_at->format('d M Y') }}</span>
                <span>·</span>
                <span>{{ $featured->created_at->diffForHumans() }}</span>
                @if($featured->tags->isNotEmpty())
                <span style="margin-left:.5rem;display:inline-flex;gap:.3rem;flex-wrap:wrap">
                    @foreach($featured->tags as $t)
                    <span class="badge" style="font-size:.7rem">#{{ $t->name }}</span>
                    @endforeach
                </span>
                @endif
            </div>

            <div style="margin-top:.75rem">
                <a class="btn primary" href="{{ route('posts.show', $featured) }}">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined" style="font-size:18px">arrow_forward</span>
                </a>
            </div>
        </div>
    </article>
</div>
@endif

<!-- Latest Posts Section -->
<div style="margin-bottom:3rem">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;flex-wrap:wrap;gap:1rem">
        <div style="display:flex;align-items:center;gap:.5rem">
            <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:22px">schedule</span>
            <h2 style="font-size:1.35rem">Tulisan Terbaru</h2>
        </div>
        <a class="btn tonal" href="{{ route('posts.index') }}" style="font-size:.85rem;padding:.4rem .9rem">
            <span>Lihat Semua</span>
            <span class="material-symbols-outlined" style="font-size:16px">arrow_forward</span>
        </a>
    </div>

    <div class="grid-posts">
        @forelse($latestPosts as $p)
        <article class="post-card">
            <a href="{{ route('posts.show', $p) }}" style="display:block;overflow:hidden">
                @include('layouts._cover', ['url' => $p->thumbnailUrl(), 'title' => $p->title, 'class' => 'cover'])
            </a>
            <div class="body">
                <div style="display:flex;align-items:center;gap:.4rem;flex-wrap:wrap">
                    @if($p->category)
                    <span class="badge cat">
                        <span class="material-symbols-outlined" style="font-size:14px">folder</span>
                        <span>{{ $p->category->name }}</span>
                    </span>
                    @endif
                </div>

                <h2>
                    <a href="{{ route('posts.show', $p) }}">{{ $p->title }}</a>
                </h2>

                @if($p->excerpt)
                <p class="ex">{{ \Illuminate\Support\Str::limit($p->excerpt, 120) }}</p>
                @endif

                <div class="meta" style="margin-top:auto">
                    <span class="material-symbols-outlined" style="font-size:15px">schedule</span>
                    <span>{{ $p->created_at->format('d M Y') }}</span>
                    <span>·</span>
                    <span>{{ $p->created_at->diffForHumans() }}</span>
                </div>

                @if($p->tags->isNotEmpty())
                <div style="display:flex;gap:.3rem;flex-wrap:wrap;margin-top:.25rem">
                    @foreach($p->tags as $t)
                    <span class="badge">#{{ $t->name }}</span>
                    @endforeach
                </div>
                @endif
            </div>
        </article>
        @empty
        <div class="card" style="grid-column:1/-1;text-align:center;padding:3rem 1.5rem">
            <span class="material-symbols-outlined" style="font-size:48px;color:var(--md-sys-color-on-surface-variant);opacity:.5;margin-bottom:.5rem">article</span>
            <p style="font-size:1.1rem;margin-bottom:1rem">Belum ada tulisan lain yang diterbitkan.</p>
            <a class="btn primary" href="{{ route('posts.create') }}">+ Buat Tulisan Baru</a>
        </div>
        @endforelse
    </div>
</div>

<!-- Categories Section -->
@if($categories->isNotEmpty())
<div class="card" style="border-radius:var(--md-radius-xl);padding:2rem">
    <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:1rem">
        <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:22px">category</span>
        <h2 style="font-size:1.25rem">Jelajahi Berdasarkan Kategori</h2>
    </div>
    <div style="display:flex;gap:.6rem;flex-wrap:wrap">
        @foreach($categories as $c)
        <a href="{{ route('posts.index') }}" class="badge cat" style="padding:.45rem .9rem;font-size:.85rem;border-radius:var(--md-radius-full);text-decoration:none">
            <span class="material-symbols-outlined" style="font-size:16px">folder_open</span>
            <span>{{ $c->name }}</span>
            <span style="opacity:.75;font-weight:400;margin-left:.25rem">({{ $c->posts_count }})</span>
        </a>
        @endforeach
    </div>
</div>
@endif

@endsection
