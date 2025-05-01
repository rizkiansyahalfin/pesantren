<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['kelas_id', 'pelajaran_id', 'ustadz_id', 'waktu'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }

    public function ustadz()
    {
        return $this->belongsTo(Ustadz::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
