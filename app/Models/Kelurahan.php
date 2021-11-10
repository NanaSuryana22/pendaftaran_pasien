<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelurahan', 'nama_kecamatan', 'nama_kota'
    ];

    protected $table = "kelurahans";

    public function pasien()
    {
        return $this->hasOne('App\Models\Pasien', 'kelurahan_id');
    }
}
