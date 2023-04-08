<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // public function getBobotNameAttribute()
    // {
    //     $nilai = $this->nilai;
    //     $nilasistandart = Kriteria::where('id', $this->kriteria_id)->sum('nilai');
    //     $selisih = ($nilasistandart - $nilai);
    //     $bobot = Bobot::where('selisih', $selisih)->get('bobot');
    //     return $selisih;
    // }

    // public function getUsernameAttribute()
    // {
    //     $username = $this->select('user_id')->distinct()->get();
    //     return $this->BelongsTo(User::class); 
    // }

}
