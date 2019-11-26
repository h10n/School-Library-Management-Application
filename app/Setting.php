<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
      protected $fillable = ['name','address','about','denda','durasi','max_peminjaman'];

}
