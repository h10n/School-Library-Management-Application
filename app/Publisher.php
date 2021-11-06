<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Publisher extends Model
{
  protected $fillable = ['name'];

  public function books()
  {
    return $this->hasMany('App\Book');
  }
  public static function boot()
  {
    parent::boot();
    self::deleting(function ($publisher) {
      //cek apakah penulis masih punya buku
      if ($publisher->books->count() > 0) {
        //siapkan pesan error
        $html = 'Penerbit tidak bisa dihapus karena masih memiliki buku : ';
        $html .= '<ul>';
        foreach ($publisher->books as $book) {
          $html .= "<li>$book->title</li>";
        }
        $html .= "</ul>";
        Session::flash("flash_notification", [
          "level" => "danger",
          "message" => $html
        ]);
        //batalkan proses Hapus
        return false;
      }
    });
  }
}
