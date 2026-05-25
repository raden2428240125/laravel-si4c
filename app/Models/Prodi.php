<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{ 
    protected $fillable = ['nama_prodi', 'singkatan', 'kaprodi', 'fakultas_id']; 
    // relasi dengan tabel fakultas
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
