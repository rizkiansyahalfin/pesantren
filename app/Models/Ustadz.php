<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pelajaran', 'kode_pelajaran'];

    public function ustadzs()
    {
        return $this->belongsToMany(Ustadz::class, 'ustadz_pelajarans');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
