<?php

namespace App\Http\Controllers\Api; // Namespace untuk API controller

use App\Http\Controllers\Controller; // Mengimpor base controller Laravel
use Illuminate\Http\Request; // Mengimpor class Request
use App\Models\Santri; // Mengimpor model Santri

class SantriApiController extends Controller // Mendefinisikan controller untuk API Santri
{
    /**
     * Menampilkan semua data santri.
     */
    public function index()
    {
        // Mengambil semua data santri beserta relasi kamar dan kelasnya
        $santris = Santri::with(['kamar', 'kelas'])->get();

        // Mengembalikan data dalam format JSON
        return response()->json($santris);
    }

    /**
     * Menyimpan data santri baru.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim melalui request
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required|unique:santris', // nis tidak boleh duplikat
            'tanggal_lahir' => 'required|date',
            'alamat_asal' => 'required',
            'kamar_id' => 'required|exists:kamars,id', // harus sesuai ID kamar yang ada
            'kelas_id' => 'required|exists:kelas,id', // harus sesuai ID kelas yang ada
        ]);

        // Menyimpan data ke database
        $santri = Santri::create($validated);

        // Mengembalikan response JSON sukses dengan status 201 (Created)
        return response()->json([
            'message' => 'Santri berhasil ditambahkan.',
            'data' => $santri
        ], 201);
    }

    /**
     * Menampilkan detail satu santri berdasarkan ID.
     */
    public function show(string $id)
    {
        // Mencari santri berdasarkan ID, termasuk relasi kamar dan kelas
        $santri = Santri::with(['kamar', 'kelas'])->find($id);

        // Jika tidak ditemukan, kembalikan 404
        if (!$santri) {
            return response()->json(['message' => 'Santri tidak ditemukan.'], 404);
        }

        // Jika ditemukan, kembalikan data santri
        return response()->json($santri);
    }

    /**
     * Memperbarui data santri berdasarkan ID.
     */
    public function update(Request $request, string $id)
    {
        // Cari data santri berdasarkan ID
        $santri = Santri::find($id);

        // Jika santri tidak ditemukan, kembalikan 404
        if (!$santri) {
            return response()->json(['message' => 'Santri tidak ditemukan.'], 404);
        }

        // Validasi data yang akan diperbarui
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required|unique:santris,nis,' . $santri->id, // nis harus unik kecuali milik sendiri
            'tanggal_lahir' => 'required|date',
            'alamat_asal' => 'required',
            'kamar_id' => 'required|exists:kamars,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Update data di database
        $santri->update($validated);

        // Kembalikan response sukses
        return response()->json([
            'message' => 'Santri berhasil diperbarui.',
            'data' => $santri
        ]);
    }

    /**
     * Menghapus data santri berdasarkan ID.
     */
    public function destroy(string $id)
    {
        // Cari data santri berdasarkan ID
        $santri = Santri::find($id);

        // Jika santri tidak ditemukan, kembalikan 404
        if (!$santri) {
            return response()->json(['message' => 'Santri tidak ditemukan.'], 404);
        }

        // Hapus santri dari database
        $santri->delete();

        // Kembalikan pesan sukses
        return response()->json(['message' => 'Santri berhasil dihapus.']);
    }
}
