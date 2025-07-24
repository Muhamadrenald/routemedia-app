<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketInternet extends Model
{
    protected $fillable = [
        'nama_paket',
        'harga',
        'kecepatan',
    ];

    public function kliens()
    {
        return $this->hasMany(Klien::class);
    }
}
