@php $isEdit = isset($post); @endphp
<div class="card" style="max-width:52rem;margin:0 auto;border-radius:var(--md-radius-xl);padding:2rem">
    <form method="POST" action="{{ $isEdit ? route('posts.update', $post) : route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <!-- Judul -->
        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">title</span>
                <span>Judul Artikel <span style="color:var(--md-sys-color-error)">*</span></span>
            </span>
            <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" placeholder="Contoh: Membangun Pertahanan WAF dengan Laravel" required>
        </label>

        <!-- Slug & Kategori Row -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));gap:1.25rem">
            <label>
                <span style="display:flex;align-items:center;gap:.35rem">
                    <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">link</span>
                    <span>Slug URL <span style="font-weight:400;color:var(--md-sys-color-on-surface-variant);font-size:.8rem">(opsional / otomatis)</span></span>
                </span>
                <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" placeholder="judul-artikel-otomatis">
            </label>

            <label>
                <span style="display:flex;align-items:center;gap:.35rem">
                    <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">folder</span>
                    <span>Kategori</span>
                </span>
                <select name="category_id">
                    <option value="">— Tanpa kategori —</option>
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}" @selected(old('category_id', $post->category_id ?? '') == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <!-- Ringkasan -->
        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">short_text</span>
                <span>Ringkasan / Excerpt <span style="font-weight:400;color:var(--md-sys-color-on-surface-variant);font-size:.8rem">(opsional)</span></span>
            </span>
            <textarea name="excerpt" rows="2" placeholder="Penjelasan singkat inti pembahasan...">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        </label>

        <!-- Isi Artikel -->
        <label>
            <span style="display:flex;align-items:center;gap:.35rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">edit_document</span>
                <span>Isi Konten Artikel <span style="color:var(--md-sys-color-error)">*</span></span>
            </span>
            <textarea name="body" rows="12" placeholder="Tuliskan materi dan isi artikel lengkap di sini..." required>{{ old('body', $post->body ?? '') }}</textarea>
        </label>

        <!-- Tags Selection -->
        <div style="margin-bottom:1.5rem">
            <span style="display:flex;align-items:center;gap:.35rem;font-size:.88rem;font-weight:600;margin-bottom:.5rem">
                <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">label</span>
                <span>Pilih Tags Terkait</span>
            </span>
            <div class="checks">
                @foreach($tags as $t)
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $t->id }}" @checked(in_array($t->id, old('tags', isset($post) ? $post->tags->pluck('id')->all() : [])))>
                    <span>#{{ $t->name }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Thumbnail Upload -->
        <div style="margin-bottom:1.5rem;padding:1.25rem;background:var(--md-sys-color-surface-container-high);border-radius:var(--md-radius-lg);border:1px dashed var(--md-sys-color-outline)">
            <label style="margin-bottom:.5rem">
                <span style="display:flex;align-items:center;gap:.35rem">
                    <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">image</span>
                    <span>Thumbnail Gambar (jpg, png, webp, maks 2MB)</span>
                </span>
                <input type="file" name="thumbnail" accept="image/*" data-max-mb="2">
            </label>

            <script>
            (function (label) {
                var input = label ? label.querySelector('input[type="file"]') : null;
                if (!input) return;
                input.addEventListener('change', function () {
                    var max = parseInt(input.dataset.maxMb || '2', 10) * 1024 * 1024;
                    if (input.files && input.files[0] && input.files[0].size > max) {
                        alert('Ukuran gambar melebihi ' + input.dataset.maxMb + 'MB — pilih berkas yang lebih kecil agar bisa diunggah.');
                        input.value = '';
                    }
                });
            })(document.currentScript ? document.currentScript.previousElementSibling : null);
            </script>

            @if($isEdit && $post->thumbnailUrl())
            <div style="display:flex;align-items:center;gap:1.25rem;margin-top:1rem;flex-wrap:wrap">
                <img src="{{ $post->thumbnailUrl() }}" width="140" style="border-radius:var(--md-radius-md);box-shadow:var(--md-elevation-1)" alt="">
                <label style="display:inline-flex;gap:.5rem;align-items:center;cursor:pointer;margin:0">
                    <input type="checkbox" name="remove_thumbnail" value="1" style="width:18px;height:18px;accent-color:var(--md-sys-color-error)">
                    <span style="color:var(--md-sys-color-error);font-weight:600">Hapus thumbnail saat ini</span>
                </label>
            </div>
            @endif
        </div>

        <!-- Published Status Checkbox -->
        <div style="margin-bottom:2rem">
            <label style="display:inline-flex;gap:.6rem;align-items:center;cursor:pointer">
                <input type="checkbox" name="is_published" value="1" style="width:20px;height:20px;accent-color:var(--md-sys-color-primary)" @checked(old('is_published', $post->is_published ?? true))>
                <span style="font-size:1rem;font-weight:600">Terbitkan langsung ke publik (Published)</span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;padding-top:1.5rem;border-top:1px solid var(--md-sys-color-outline-variant)">
            <button class="btn primary" type="submit" style="padding:.65rem 1.6rem;font-size:1rem">
                <span class="material-symbols-outlined">{{ $isEdit ? 'save' : 'publish' }}</span>
                <span>{{ $isEdit ? 'Perbarui Post' : 'Terbitkan Post' }}</span>
            </button>

            @if(!$isEdit)
            @include('layouts._autofill', ['presets' => [
                ['fields' => ['title' => 'Cara Aman Menyimpan Rahasia Aplikasi', 'category_id' => '__RANDOM_OPTION__', 'excerpt' => 'Jangan taruh API key di kode: pakai .env, config, dan secrets manager.', 'body' => "Kunci API, token, dan kredensial basis data tidak boleh tertulis di kode sumber atau commit Git.\n\nTaruh di .env, baca via config(), dan putar ulang (rotate) berkala.\n\nUntuk production, gunakan secrets manager bawaan platform hosting Anda."], 'checks' => ['tags[]' => ['take' => 2]]],
                ['fields' => ['title' => 'Rate Limit Sederhana Tanpa Paket Tambahan', 'category_id' => '__RANDOM_OPTION__', 'excerpt' => 'Throttle bawaan Laravel untuk menahan brute force dan spam API.', 'body' => "Middleware throttle membatasi jumlah request per menit per IP atau per user.\n\nPasang di rute login dan API publik agar serangan brute force melambat drastis.\n\nKombinasikan dengan pencatatan agar pola serangan terbaca di dashboard."], 'checks' => ['tags[]' => ['take' => 2]]],
                ['fields' => ['title' => 'Backup Terenkripsi Sebelum Migrasi Server', 'category_id' => '__RANDOM_OPTION__', 'excerpt' => 'Checklist backup: database, storage, dan .env sebelum pindah VPS.', 'body' => "Sebelum migrasi, cadangkan database, folder storage, dan berkas .env ke lokasi terenkripsi.\n\nUji restore di server staging sebelum mematikan server lama.\n\nCatat checksum tiap arsip agar korupsi berkas langsung ketahuan."], 'checks' => ['tags[]' => ['take' => 2]]],
                ['fields' => ['title' => 'Aktifkan 2FA untuk Akun Admin Panel', 'category_id' => '__RANDOM_OPTION__', 'excerpt' => 'Kata sandi saja tidak cukup untuk akun berkuasa penuh.', 'body' => "Akun admin adalah target utama pencurian kredensial.\n\nAktifkan autentikasi dua faktor dan simpan kode pemulihan di tempat aman.\n\nTinjau sesi aktif berkala dan cabut sesi dari perangkat yang tidak dikenal."], 'checks' => ['tags[]' => ['take' => 2]]],
            ]])
            @endif

            <a class="btn" href="{{ route('posts.index') }}" style="margin-left:auto">Batal</a>
        </div>
    </form>
</div>
