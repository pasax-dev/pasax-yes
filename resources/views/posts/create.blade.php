@extends('layouts.app')
@section('title', 'Tulis Post Baru')
@section('content')

<div class="hero">
    <h1>
        <span class="material-symbols-outlined" style="font-size:32px;color:var(--md-sys-color-primary)">edit_square</span>
        <span>Tulis Post Baru</span>
    </h1>
    <p>Terbitkan artikel atau catatan teknis baru ke dalam publikasi blog.</p>
</div>

@include('posts._form')

@endsection
