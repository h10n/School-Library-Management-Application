<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Member extends Model
{
  protected $appends = ['tgl_terdaftar', 'member_type'];
  protected $fillable = ['no_induk', 'name', 'kelas', 'jurusan', 'jenis_anggota', 'address', 'email', 'phone', 'photo'];

  public function borrowLogs()
  {
    return $this->hasMany('App\BorrowLog');
  }
  public function user()
  {
    return $this->hasOne('App\User');
  }
  public function getNomorNamaAttribute($value)
  {
    return $this->no_induk . ' - ' . $this->name;
  }
  public function getTglTerdaftarAttribute()
  {
    return $this->created_at->format('d-m-Y');
  }
  public function getMemberTypeAttribute()
  {
    return $this->jenis_anggota === 'guru/staff' ? 'teacher/staff' : 'student';
  }

  public static function boot()
  {
    parent::boot();
    self::deleting(function ($member) {
      if ($member->borrowLogs()->count() > 0) {
        Session::flash("flash_notification", [
          "level" => "danger",
          "message" => "$member->name can't be deleted because it still has transaction data"
        ]);
        return false;
      }
    });
  }
}
