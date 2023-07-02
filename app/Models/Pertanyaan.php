<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['aspek', 'kriteria'];
    protected $fillable = ['aspek_id', 'kriteria_id', 'nilai', 'ket'];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
