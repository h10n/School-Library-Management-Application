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
    protected $fillable = ['name','username', 'email', 'password','telp','alamat', 'member_id', 'photo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//hapus when not needed anymoa
    public function borrowLogs()
    {
      return $this->hasMany('App\BorrowLog');
    }
    public function borrow(Book $book)
    {
      //apakah masih ada stok bagus nya sebelum adtau sesudah ya?
      if ($book->stock < 1) {
        throw new BookException("Buku $book->title sedang tidak tersedia");
      }
      //apakah buku sedang di pinjam
      if ($this->borrowLogs()->where('book_id', $book->id)->where('is_returned', 0)->count() > 0) {
        throw new BookException("Buku $book->title sedang Anda Pinjam");
      }
      $borrowLog = BorrowLog::create([
        'user_id' => $this->id,
        'book_id' => $book->id,
      ]);
      return $borrowLog;
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

    // public function employee()
    // {
    //   return $this->hasOne(Employee::class)->latest();
    // }
    public static function boot()
    {
      parent::boot();
      self::deleting(function ($user){
        if ($user->borrowLogs()->borrowed()->count() > 0) {
          $html = 'User tidak bisa dihapus karena masih meminjam buku : ';
          $html .= '<ul>';
          foreach ($user->borrowLogs()->borrowed()->get() as $log) {
            $titles = $log->book->title;
            $html .= "<li>$titles</li>";
          }
          $html .= "</ul>";
          Session::flash("flash_notification",[
            "level" => "danger",
            "message" => $html
          ]);
          return false;
        }
      });
    }
}
