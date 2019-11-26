<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\BorrowLog;


class Member extends Model
{
    //
    protected $fillable = ['nis','name','kelas','jurusan','address','email','phone','photo'];
    public function books()
    {
      return $this->hasMany('App\Book');
    }

    public function getTitleAttribute($value)
{
    return $this->nis.' - '.$this->name;
}

public function borrowLogs()
{
  return $this->hasMany('App\BorrowLog');
}

}
