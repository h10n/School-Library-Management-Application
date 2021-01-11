<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['no_induk','name','keperluan','jenis_anggota','kelas'];
}
