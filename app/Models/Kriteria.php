<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['aspek'];
    protected $fillable = ['aspek_id', 'name', 'jenis', 'nilai'];

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function getJenisNameAttribute()
    {
        $jenis = $this->jenis;
        if ($jenis == "cf") {
            return 'Core Factor';
        }
        return 'Secondary Factor';
    }
}
