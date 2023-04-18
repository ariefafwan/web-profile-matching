<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class);
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function ranking()
    {
        return $this->hasMany(Ranking::class);
    }
}
