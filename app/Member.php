<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\BorrowLog;

class Member extends Model
{
    protected $appends = ['tgl_terdaftar'];
    protected $fillable = ['no_induk','name','kelas','jurusan','jenis_anggota','address','email','phone','photo'];
    // public function books()
    // {
    //     return $this->hasMany('App\Book');
    // }

    public function getTitleAttribute($value)
    {
        return $this->no_induk.' - '.$this->name;
    }
    public function getTglTerdaftarAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function borrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public static function boot()
    {
      parent::boot();
      self::deleting(function ($member){
        if ($member->borrowLogs()->count() > 0) {
          Session::flash("flash_notification",[
            "level" => "danger",
            "message" => "$member->name tidak bisa dihapus karena masih memiliki data transaksi"
          ]);
          return false;
        }
      });

    }
}
