<?php

namespace App\Http\Controllers; // Menetapkan namespace controller ini berada

use App\Models\Santri; // Mengimpor model Santri
use App\Models\Kamar;  // Mengimpor model Kamar
use App\Models\Kelas;  // Mengimpor model Kelas
use Illuminate\Http\Request; // Mengimpor class Request untuk menangani input dari user

class SantriController extends Controller // Mendefinisikan class SantriController yang mewarisi Controller Laravel
{
    // Menampilkan semua data santri
    public function index()
    {
        // Mengambil semua data santri beserta relasi kamar dan kelasnya
        $santris = Santri::with(['kamar', 'kelas'])->get();

        // Mengembalikan view 'santri.index' dengan data santris
        return view('santri.index', compact('santris'));
    }

    // Menampilkan form tambah santri
    public function create()
    {
        // Mengambil semua data kamar dan kelas
        $kamars = Kamar::all();
        $kelas = Kelas::all();

        // Mengembalikan view 'santri.create' dengan data kamar dan kelas
        return view('santri.create', compact('kamars', 'kelas'));
    }

    // Menyimpan data santri ke database
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required|unique:santris', // nis harus unik
            'tanggal_lahir' => 'required|date', // harus format tanggal
            'alamat_asal' => 'required',
            'kamar_id' => 'required|exists:kamars,id', // kamar harus ada di tabel kamars
            'kelas_id' => 'required|exists:kelas,id', // kelas harus ada di tabel kelas
        ]);

        // Menyimpan data ke dalam tabel santris
        Santri::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('santri.index')->with('', 'Santri berhasil ditambahkan.');
    }

    // Menampilkan form edit santri
    public function edit(Santri $santri)
    {
        // Mengambil semua data kamar dan kelas untuk dropdown
        $kamars = Kamar::all();
        $kelas = Kelas::all();

        // Mengembalikan view 'santri.edit' dengan data santri, kamar, dan kelas
        return view('santri.edit', compact('santri', 'kamars', 'kelas'));
    }

    // Memproses update data santri
    public function update(Request $request, Santri $santri)
    {
        // Validasi data input dari form update
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required|unique:santris,nis,' . $santri->id, // nis unik kecuali milik santri ini
            'tanggal_lahir' => 'required|date',
            'alamat_asal' => 'required',
            'kamar_id' => 'required|exists:kamars,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Update data di database
        $santri->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('santri.index')->with('success', 'Santri berhasil diperbarui.');
    }

    // Menghapus data santri
    public function destroy(Santri $santri)
    {
        // Hapus data dari database
        $santri->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('santri.index')->with('success', 'Santri berhasil dihapus.');
    }

    // Menampilkan detail data santri
    public function show(Santri $santri)
    {
        // Mengembalikan view 'santri.show' dengan data santri
        return view('santri.show', compact('santri'));
    }
}
