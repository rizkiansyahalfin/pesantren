@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 720px;">
    <h1 class="h4 fw-bold mb-4">Detail Santri</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Nama Lengkap:</strong> {{ $santri->nama_lengkap }}</p>
            <p><strong>NIS:</strong> {{ $santri->nis }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $santri->tanggal_lahir->format('d-m-Y') }}</p>
            <p><strong>Alamat Asal:</strong> {{ $santri->alamat_asal }}</p>
            <p><strong>Kamar:</strong> {{ $santri->kamar->nama_kamar ?? '-' }}</p>
            <p><strong>Kelas:</strong> {{ $santri->kelas->nama_kelas ?? '-' }}</p>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('santri.edit', $santri->id) }}" class="btn btn-primary">
            ✏️ Edit
        </a>

        <form action="{{ route('santri.destroy', $santri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus santri ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                🗑️ Hapus
            </button>
        </form>

        <a href="{{ route('santri.index') }}" class="btn btn-outline-secondary ms-auto">
            ← Kembali
        </a>
    </div>
</div>
@endsection
