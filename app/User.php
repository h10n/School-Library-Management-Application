<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Book;
use App\BorrowLog;
use App\Exceptions\BookException;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
  use EntrustUserTrait;
  use Notifiable;

  protected $appends = ['role_name'];
  protected $dates = ['last_login'];
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'username', 'email', 'password', 'telp', 'alamat', 'member_id', 'photo'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function borrowLogs()
  {
    return $this->hasMany('App\BorrowLog');
  }

  public function borrowLogsReturned()
  {
    return $this->hasMany('App\BorrowLog', 'user_returned_id');
  }

  public function member()
  {
    return $this->belongsTo('App\Member');
  }

  public function getRoleNameAttribute()
  {
    $val = $this->roles()->first();
    return $val ? $val->name : '';
  }

  public static function boot()
  {
    parent::boot();
    self::deleting(function ($user) {
      if (!$user->borrowLogs->isEmpty() || !$user->borrowLogsReturned->isEmpty()) {
        Session::flash("flash_notification", [
          "level" => "danger",
          "message" => "$user->username tidak bisa dihapus karena masih memiliki data transaksi"
        ]);
        return false;
      }
    });
  }
}
