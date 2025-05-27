<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'nis',
        'tanggal_lahir',
        'alamat_asal',
        'kamar_id',
        'kelas_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
