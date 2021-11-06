<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['no_induk', 'name', 'keperluan', 'jenis', 'kelas'];
    protected $appends = ['tgl_terdaftar'];
    
    public function getTglTerdaftarAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }
}
