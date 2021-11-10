<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'rt', 'rw', 'kelurahan_id', 'tanggal_lahir', 'jenis_kelamin'
    ];

    protected $table = "pasiens";

    public function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan', 'kelurahan_id');
    }
}
