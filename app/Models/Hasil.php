<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user', 'aspek', 'kriteria', 'bobot'];

    public function user()
    {
        return $this->belongsTo(User::class);
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
