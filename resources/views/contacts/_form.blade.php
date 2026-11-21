@csrf
@if(isset($contact))
    @method('PUT')
@endif

<label>
    <span style="display:flex;align-items:center;gap:.35rem">
        <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">person</span>
        <span>Nama Lengkap <span style="color:var(--md-sys-color-error)">*</span></span>
    </span>
    <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" placeholder="Contoh: Ahmad Fadilah" required autofocus>
</label>

<label>
    <span style="display:flex;align-items:center;gap:.35rem">
        <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">mail</span>
        <span>Alamat Email <span style="color:var(--md-sys-color-error)">*</span></span>
    </span>
    <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" placeholder="email@contoh.test" required>
</label>

<label>
    <span style="display:flex;align-items:center;gap:.35rem">
        <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">call</span>
        <span>Nomor Telepon</span>
    </span>
    <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" placeholder="08123456789">
</label>

<label>
    <span style="display:flex;align-items:center;gap:.35rem">
        <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">location_on</span>
        <span>Alamat Tinggal / Kantor</span>
    </span>
    <textarea name="address" rows="3" placeholder="Jl. Sudirman No. 10...">{{ old('address', $contact->address ?? '') }}</textarea>
</label>

<!-- Avatar Box -->
<div style="margin-bottom:1.5rem;padding:1.25rem;background:var(--md-sys-color-surface-container-high);border-radius:var(--md-radius-lg);border:1px dashed var(--md-sys-color-outline)">
    <label style="margin-bottom:.5rem">
        <span style="display:flex;align-items:center;gap:.35rem">
            <span class="material-symbols-outlined" style="font-size:18px;color:var(--md-sys-color-primary)">account_circle</span>
            <span>Foto Avatar (jpg, png, webp, maks 2MB)</span>
        </span>
        <input type="file" name="avatar" accept="image/*">
    </label>

    @if(isset($contact) && $contact->avatarUrl())
    <div style="display:flex;align-items:center;gap:1rem;margin-top:1rem">
        <img src="{{ $contact->avatarUrl() }}" alt="avatar" width="64" height="64" style="border-radius:var(--md-radius-full);object-fit:cover;box-shadow:var(--md-elevation-1)">
        <span style="font-size:.82rem;color:var(--md-sys-color-on-surface-variant)">Avatar saat ini — unggah file baru untuk memperbarui.</span>
    </div>
    @endif
</div>

<!-- Submit & Actions -->
<div style="display:flex;align-items:center;gap:1rem;padding-top:1.25rem;border-top:1px solid var(--md-sys-color-outline-variant);flex-wrap:wrap">
    <button class="btn primary" type="submit">
        <span class="material-symbols-outlined">save</span>
        <span>{{ $submitLabel ?? 'Simpan Kontak' }}</span>
    </button>
    <a class="btn" href="{{ route('contacts.index') }}">Batal</a>
</div>
