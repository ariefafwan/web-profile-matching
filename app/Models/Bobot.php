<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['hasil'];

    public function hasil()
    {
        return $this->belongsTo(Hasil::class);
    }
}
