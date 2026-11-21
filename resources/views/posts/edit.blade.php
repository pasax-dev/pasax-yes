@extends('layouts.app')
@section('title', 'Ubah Post')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">edit</span>
        <span>Ubah Post</span>
    </h1>
    <p>Memperbarui artikel: <strong>{{ $post->title }}</strong></p>
</div>

@include('posts._form', ['post' => $post])

@endsection
