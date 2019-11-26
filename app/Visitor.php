<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['no_induk', 'name', 'keperluan', 'jenis', 'kelas'];
    protected $appends = ['tgl_terdaftar','visitor_type'];
    
    public function getTglTerdaftarAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function getVisitorTypeAttribute()
    {
      return $this->jenis === 'guru/staff' ? 'teacher/staff' : ( $this->jenis === 'siswa/i' ? 'student' : 'general public');
    }
}
