<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
            'name',
            'address',
            'website',
            'email',
            'pengelola',
            'about',
            'denda',
            'durasi',
            'max_peminjaman',
            'kepala_perpustakaan',
            'nip_kepala_perpustakaan',
            'pustakawan',
            'nip_pustakawan'
      ];
}
