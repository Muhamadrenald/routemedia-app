<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    // Tambahkan 'paket_internet_id' ke properti fillable
    protected $fillable = [
        'nama_klien',
        'alamat',
        'no_whatsapp',
        'foto_ktp',
        'paket_internet_id'
    ];

    public function paketInternet()
    {
        return $this->belongsTo(PaketInternet::class);
    }
}
