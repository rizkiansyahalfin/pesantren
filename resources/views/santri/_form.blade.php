@csrf

<div class="mb-3">
    <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap"
        value="{{ old('nama_lengkap', $santri->nama_lengkap ?? '') }}"
        class="form-control @error('nama_lengkap') is-invalid @enderror">
    @error('nama_lengkap')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nis" class="form-label fw-semibold">NIS</label>
    <input type="text" name="nis" id="nis"
        value="{{ old('nis', $santri->nis ?? '') }}"
        class="form-control @error('nis') is-invalid @enderror">
    @error('nis')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
        value="{{ old('tanggal_lahir', isset($santri) ? $santri->tanggal_lahir->format('Y-m-d') : '') }}"
        class="form-control @error('tanggal_lahir') is-invalid @enderror">
    @error('tanggal_lahir')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="alamat_asal" class="form-label fw-semibold">Alamat Asal</label>
    <textarea name="alamat_asal" id="alamat_asal" rows="3"
        class="form-control @error('alamat_asal') is-invalid @enderror">{{ old('alamat_asal', $santri->alamat_asal ?? '') }}</textarea>
    @error('alamat_asal')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kamar_id" class="form-label fw-semibold">Kamar</label>
    <select name="kamar_id" id="kamar_id"
        class="form-select @error('kamar_id') is-invalid @enderror">
        <option value="">-- Pilih Kamar --</option>
        @foreach ($kamars as $kamar)
        <option value="{{ $kamar->id }}" {{ old('kamar_id', $santri->kamar_id ?? '') == $kamar->id ? 'selected' : '' }}>
            {{ $kamar->nama_kamar }}
        </option>
        @endforeach
    </select>
    @error('kamar_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kelas_id" class="form-label fw-semibold">Kelas</label>
    <select name="kelas_id" id="kelas_id"
        class="form-select @error('kelas_id') is-invalid @enderror">
        <option value="">-- Pilih Kelas --</option>
        @foreach ($kelas as $kelasItem)
        <option value="{{ $kelasItem->id }}" {{ old('kelas_id', $santri->kelas_id ?? '') == $kelasItem->id ? 'selected' : '' }}>
            {{ $kelasItem->nama_kelas }}
        </option>
        @endforeach
    </select>
    @error('kelas_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- <button type="submit" class="btn btn-success">
    Simpan
</button> --}}
