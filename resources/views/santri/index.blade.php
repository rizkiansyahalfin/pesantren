@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Daftar Santri</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold">Tabel Data Santri</span>
                <a href="{{ route('santri.create') }}" class="btn btn-sm btn-primary">
                    ➕ Tambah Santri
                </a>
            </div>

            <div class="table-responsive">
                <table id="santri-table" name="santri-table" class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>NIS</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat Asal</th>
                            <th>Kamar</th>
                            <th>Kelas</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santris as $santri)
                        <tr>
                            <td>{{ $santri->nama_lengkap }}</td>
                            <td>{{ $santri->nis }}</td>
                            <td>{{ $santri->tanggal_lahir->format('d-m-Y') }}</td>
                            <td>{{ $santri->alamat_asal }}</td>
                            <td>{{ $santri->kamar->nama_kamar ?? '-' }}</td>
                            <td>{{ $santri->kelas->nama_kelas ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('santri.show', $santri) }}" class="btn btn-sm btn-outline-success" title="Lihat">👁️</a>
                                    <a href="{{ route('santri.edit', $santri) }}" class="btn btn-sm btn-outline-primary" title="Edit">✏️</a>
                                    <form action="{{ route('santri.destroy', $santri) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus santri ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Data santri belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
