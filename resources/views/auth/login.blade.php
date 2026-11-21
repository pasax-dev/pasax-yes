@extends('layouts.app')
@section('title', 'Masuk')
@section('content')

<div class="card" style="max-width:28rem;margin:2.5rem auto;border-radius:var(--md-radius-xl);padding:2.25rem;box-shadow:var(--md-elevation-3)">
    <!-- Header -->
    <div style="text-align:center;margin-bottom:1.75rem">
        <div style="display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;border-radius:var(--md-radius-lg);background:var(--md-sys-color-primary-container);color:var(--md-sys-color-primary);margin-bottom:.75rem">
            <span class="material-symbols-outlined" style="font-size:32px">lock</span>
        </div>
        <h1 style="font-size:1.75rem;margin:0">Masuk Akun</h1>
        <p style="color:var(--md-sys-color-on-surface-variant);font-size:.9rem;margin-top:.25rem">Silakan masukkan kredensial untuk mengakses dashboard.</p>
    </div>

    <!-- Quick Demo Fill Helper -->
    <div style="background:var(--md-sys-color-surface-container-high);border-radius:var(--md-radius-md);padding:.75rem 1rem;margin-bottom:1.5rem;display:flex;align-items:center;justify-content:space-between;gap:.5rem">
        <span style="font-size:.82rem;color:var(--md-sys-color-on-surface-variant)">Akun Lab Demo:</span>
        <button class="btn tonal" type="button" onclick="fillAdmin()" style="padding:.25rem .65rem;font-size:.78rem">
            <span class="material-symbols-outlined" style="font-size:15px">auto_awesome</span>
            <span>Isi Otomatis</span>
        </button>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">mail</span>
                <span>Alamat Email</span>
            </span>
            <input type="email" id="loginEmail" name="email" value="{{ old('email', 'admin@demo.test') }}" placeholder="nama@domain.com" required autofocus>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">key</span>
                <span>Kata Sandi</span>
            </span>
            <input type="password" id="loginPassword" name="password" value="password" placeholder="••••••••" required>
        </label>

        <div style="margin:1rem 0 1.5rem">
            <label style="display:inline-flex;gap:.5rem;align-items:center;cursor:pointer;margin:0">
                <input type="checkbox" name="remember" value="1" style="width:18px;height:18px;accent-color:var(--md-sys-color-primary)">
                <span style="font-weight:500;font-size:.9rem">Ingat saya di perangkat ini</span>
            </label>
        </div>

        <button class="btn primary" type="submit" style="width:100%;padding:.75rem;font-size:1rem;box-shadow:var(--md-elevation-2)">
            <span class="material-symbols-outlined">login</span>
            <span>Masuk Sekarang</span>
        </button>
    </form>

    <div style="text-align:center;margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant)">
        <p class="meta" style="justify-content:center">
            <span>Belum memiliki akun?</span>
            <a href="{{ route('register') }}" style="font-weight:600">Daftar sekarang →</a>
        </p>
    </div>
</div>

<script>
function fillAdmin(){
    document.getElementById('loginEmail').value = 'admin@demo.test';
    document.getElementById('loginPassword').value = 'password';
}
</script>

@endsection
