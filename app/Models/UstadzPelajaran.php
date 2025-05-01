<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UstadzPelajaran extends Model
{
    use HasFactory;

    protected $fillable = ['ustadz_id', 'pelajaran_id'];

    public function ustadz()
    {
        return $this->belongsTo(Ustadz::class);
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }
}
