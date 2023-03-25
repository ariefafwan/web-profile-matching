<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['pegawai', 'aspek', 'kriteria', 'bobot'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function bobot()
    {
        return $this->belongsTo(Bobot::class);
    }
}
