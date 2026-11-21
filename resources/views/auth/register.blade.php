@extends('layouts.app')
@section('title', 'Daftar Akun')
@section('content')

<div class="card" style="max-width:28rem;margin:2rem auto;border-radius:var(--md-radius-xl);padding:2.25rem;box-shadow:var(--md-elevation-3)">
    <!-- Header -->
    <div style="text-align:center;margin-bottom:1.75rem">
        <div style="display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;border-radius:var(--md-radius-lg);background:var(--md-sys-color-primary-container);color:var(--md-sys-color-primary);margin-bottom:.75rem">
            <span class="material-symbols-outlined" style="font-size:32px">person_add</span>
        </div>
        <h1 style="font-size:1.75rem;margin:0">Daftar Akun Baru</h1>
        <p style="color:var(--md-sys-color-on-surface-variant);font-size:.9rem;margin-top:.25rem">Daftarkan akun untuk mulai mengelola artikel dan konten.</p>
    </div>

    <!-- Quick Demo Helper -->
    <div style="background:var(--md-sys-color-surface-container-high);border-radius:var(--md-radius-md);padding:.75rem 1rem;margin-bottom:1.5rem">
        <p class="meta" style="margin:0 0 .5rem">Lab demo — isi otomatis formulir pendaftaran:</p>
        <div style="display:flex;gap:.5rem">
            <button class="btn tonal" type="button" onclick="fillDemo()" style="padding:.25rem .65rem;font-size:.78rem">
                <span class="material-symbols-outlined" style="font-size:15px">auto_awesome</span>
                <span>Isi Demo</span>
            </button>
            <button class="btn" type="button" onclick="fillRandom()" style="padding:.25rem .65rem;font-size:.78rem">
                <span class="material-symbols-outlined" style="font-size:15px">casino</span>
                <span>Data Acak</span>
            </button>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">person</span>
                <span>Nama Lengkap</span>
            </span>
            <input type="text" id="regName" name="name" value="{{ old('name', 'Pengguna Demo') }}" placeholder="Nama Anda" required autofocus>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">mail</span>
                <span>Alamat Email</span>
            </span>
            <input type="email" id="regEmail" name="email" value="{{ old('email', 'demo@example.com') }}" placeholder="email@contoh.test" required>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">lock</span>
                <span>Kata Sandi <span style="font-weight:400;color:var(--md-sys-color-on-surface-variant);font-size:.8rem">(min. 8 karakter)</span></span>
            </span>
            <input type="password" id="regPassword" name="password" value="password123" placeholder="••••••••" required>
        </label>

        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">check_circle</span>
                <span>Ulangi Kata Sandi</span>
            </span>
            <input type="password" id="regPasswordConfirm" name="password_confirmation" value="password123" placeholder="••••••••" required>
        </label>

        <div style="margin-top:1.5rem">
            <button class="btn primary" type="submit" style="width:100%;padding:.75rem;font-size:1rem;box-shadow:var(--md-elevation-2)">
                <span class="material-symbols-outlined">how_to_reg</span>
                <span>Buat Akun Sekarang</span>
            </button>
        </div>
    </form>

    <div style="text-align:center;margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant)">
        <p class="meta" style="justify-content:center">
            <span>Sudah memiliki akun?</span>
            <a href="{{ route('login') }}" style="font-weight:600">Masuk di sini →</a>
        </p>
    </div>
</div>

<script>
function fillDemo(){
    document.getElementById('regName').value = 'Pengguna Demo';
    document.getElementById('regEmail').value = 'demo@example.com';
    document.getElementById('regPassword').value = 'password123';
    document.getElementById('regPasswordConfirm').value = 'password123';
}
function fillRandom(){
    var n = Math.floor(Math.random() * 9000) + 1000;
    document.getElementById('regName').value = 'Pengguna ' + n;
    document.getElementById('regEmail').value = 'pengguna' + n + '@example.com';
    document.getElementById('regPassword').value = 'password123';
    document.getElementById('regPasswordConfirm').value = 'password123';
}
</script>

@endsection
