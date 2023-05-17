<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertas';
    protected $guarded = ['id'];

    public function nilais()
    {
        // return $this->hasOne(Nilai::class);
        return $this->hasOne(Nilai::class, 'user_id', 'id');
    }
}
