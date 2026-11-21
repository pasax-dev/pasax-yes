@extends('layouts.app')
@section('title', 'Semua Post')
@section('content')

<!-- Header Banner -->
<div class="hero">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1.5rem">
        <div>
            <h1>
                <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:32px">article</span>
                <span>Arsip Tulisan</span>
            </h1>
            <p>Kumpulan tulisan seputar WAF, keamanan siber, dan rekayasa perangkat lunak Laravel.</p>
        </div>
        <div>
            <a class="btn primary" href="{{ route('posts.create') }}" style="box-shadow:var(--md-elevation-2)">
                <span class="material-symbols-outlined">edit_note</span>
                <span>Tulis Post Baru</span>
            </a>
        </div>
    </div>
</div>

<!-- Posts Grid -->
<div class="grid-posts">
    @forelse($posts as $p)
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
                @unless($p->is_published)
                <span class="badge" style="background:var(--md-sys-color-error-container);color:var(--md-sys-color-on-error-container);border-color:transparent">
                    <span class="material-symbols-outlined" style="font-size:14px">drafts</span>
                    <span>Draft</span>
                </span>
                @endunless
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
    <div class="card" style="grid-column:1/-1;text-align:center;padding:3.5rem 1.5rem">
        <span class="material-symbols-outlined" style="font-size:52px;color:var(--md-sys-color-on-surface-variant);opacity:.5;margin-bottom:.5rem">post_add</span>
        <h3 style="margin-bottom:.5rem">Belum ada tulisan</h3>
        <p style="color:var(--md-sys-color-on-surface-variant);margin-bottom:1.25rem">Mulai tulis ide atau tutorial pertama Anda sekarang.</p>
        <a class="btn primary" href="{{ route('posts.create') }}">+ Tulis Yang Pertama</a>
    </div>
    @endforelse
</div>

<!-- Pagination -->
<div style="margin-top:2.5rem;display:flex;justify-content:center">
    {{ $posts->links() }}
</div>

@endsection
