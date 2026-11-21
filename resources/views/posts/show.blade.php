@extends('layouts.app')
@section('title', $post->title)
@section('content')

<article class="article">
    <!-- Back Navigation -->
    <div style="margin-bottom:1.5rem">
        <a class="btn" href="{{ route('posts.index') }}" style="font-size:.85rem;padding:.4rem .9rem">
            <span class="material-symbols-outlined" style="font-size:18px">arrow_back</span>
            <span>Semua Tulisan</span>
        </a>
    </div>

    <!-- Category & Tags Header -->
    <div style="display:flex;align-items:center;gap:.5rem;flex-wrap:wrap;margin-bottom:.75rem">
        @if($post->category)
        <span class="badge cat" style="padding:.3rem .75rem;font-size:.8rem">
            <span class="material-symbols-outlined" style="font-size:16px">folder</span>
            <span>{{ $post->category->name }}</span>
        </span>
        @endif

        @foreach($post->tags as $t)
        <span class="badge" style="padding:.25rem .65rem">#{{ $t->name }}</span>
        @endforeach

        <span class="badge" style="background:{{ $post->is_published ? 'var(--md-sys-color-success-container)' : 'var(--md-sys-color-error-container)' }};color:{{ $post->is_published ? 'var(--md-sys-color-on-success-container)' : 'var(--md-sys-color-on-error-container)' }};border-color:transparent">
            <span class="material-symbols-outlined" style="font-size:14px">{{ $post->is_published ? 'check_circle' : 'edit_document' }}</span>
            <span>{{ $post->is_published ? 'Published' : 'Draft' }}</span>
        </span>
    </div>

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Meta Details -->
    <div class="meta" style="margin-bottom:1.5rem">
        <span class="material-symbols-outlined" style="font-size:16px">event</span>
        <span>{{ $post->created_at->format('d M Y H:i') }}</span>
        <span>·</span>
        <span class="material-symbols-outlined" style="font-size:16px">update</span>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </div>

    <!-- Hero Image Cover -->
    <div style="overflow:hidden;border-radius:var(--md-radius-xl);margin:1.5rem 0;box-shadow:var(--md-elevation-2)">
        @include('layouts._cover', [
            'url' => $post->thumbnailUrl(),
            'title' => $post->title,
            'class' => 'hero-img',
            'style' => 'width:100%;max-height:420px;object-fit:cover;display:block',
            'loading' => 'eager'
        ])
    </div>

    <!-- Excerpt / Lead -->
    @if($post->excerpt)
    <div class="lead">
        {{ $post->excerpt }}
    </div>
    @endif

    <!-- Content Body -->
    <div class="content card" style="background:var(--md-sys-color-surface-container);border-radius:var(--md-radius-lg);padding:2rem">
        {!! nl2br(e($post->body)) !!}
    </div>

    <!-- Action Bar (Edit / Delete) -->
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;margin:2rem 0;padding-top:1.5rem;border-top:1px solid var(--md-sys-color-outline-variant);flex-wrap:wrap">
        <div style="display:flex;gap:.75rem">
            <a class="btn tonal" href="{{ route('posts.edit', $post) }}">
                <span class="material-symbols-outlined" style="font-size:18px">edit</span>
                <span>Ubah Post</span>
            </a>
            <a class="btn" href="{{ route('posts.index') }}">
                <span>Daftar Post</span>
            </a>
        </div>

        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus post ini?')">
            @csrf
            @method('DELETE')
            <button class="btn danger" type="submit">
                <span class="material-symbols-outlined" style="font-size:18px">delete</span>
                <span>Hapus Post</span>
            </button>
        </form>
    </div>

    <!-- Related Posts -->
    @if($related->isNotEmpty())
    <div style="margin-top:3.5rem">
        <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:1.25rem">
            <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary);font-size:22px">auto_awesome</span>
            <h2 style="font-size:1.35rem">Bacaan Terkait</h2>
        </div>
        <div class="grid-posts">
            @foreach($related as $r)
            <article class="post-card">
                <a href="{{ route('posts.show', $r) }}" style="display:block;overflow:hidden">
                    @include('layouts._cover', ['url' => $r->thumbnailUrl(), 'title' => $r->title, 'class' => 'cover'])
                </a>
                <div class="body">
                    <h2>
                        <a href="{{ route('posts.show', $r) }}">{{ $r->title }}</a>
                    </h2>
                    <div class="meta" style="margin-top:auto">
                        <span class="material-symbols-outlined" style="font-size:14px">event</span>
                        <span>{{ $r->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
    @endif
</article>

@endsection
