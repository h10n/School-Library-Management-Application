<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
  protected $fillable = ['name'];

  public function books()
  {
    return $this->hasMany('App\Book');
  }

  public static function boot()
  {
    parent::boot();
    self::deleting(function ($category) {
      //cek apakah penulis masih punya buku
      if ($category->books->count() > 0) {
        //siapkan pesan error
        $html = 'Kategori tidak bisa dihapus karena masih memiliki buku : ';
        $html .= '<ul>';
        foreach ($category->books as $book) {
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
