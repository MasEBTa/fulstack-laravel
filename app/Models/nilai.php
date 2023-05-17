<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';
    protected $guarded = ['id'];

    public function pesertas()
    {
        return $this->belongsTo(Peserta::class);
    }
}
