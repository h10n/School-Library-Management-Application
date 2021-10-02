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

    public function getPengelolaKopAttribute()
    {
        $wordCut = 5;
        $pengelolaWords = explode(' ', $this->pengelola);
        $wordCount = count($pengelolaWords);
        if ($wordCount>$wordCut) {
            $pengelolaFormated = array_chunk($pengelolaWords, $wordCut);
        } else {
            $pengelolaFormated[0] = $pengelolaWords;
        }
        foreach ($pengelolaFormated as $key => $pengelolaArr) {
            $pengelolaStr[$key] = implode(' ', $pengelolaArr);
        }
        return $pengelolaStr;
    }
}
