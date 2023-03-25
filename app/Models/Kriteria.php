<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['aspek'];

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }
}
