<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['santri_id', 'jadwal_id', 'status', 'keterangan'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
