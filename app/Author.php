<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Author extends Model
{
  protected $fillable = ['name', 'singkatan'];
  public function books()
  {
    return $this->hasMany('App\Book');
  }

  public static function boot()
  {
    parent::boot();
    self::deleting(function ($author) {
      //cek apakah penulis masih punya buku
      if ($author->books->count() > 0) {
        //siapkan pesan error
        $html = 'Author cannot be deleted because it still have the book: ';
        $html .= '<ul>';
        foreach ($author->books as $book) {
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
  public function getTitleAttribute($value)
  {
    return $this->singkatan . ' - ' . $this->name;
  }
}
