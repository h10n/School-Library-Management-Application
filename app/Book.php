<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class Book extends Model
{
    protected $appends = ['tgl_terdaftar', 'nama_kategori'];
    protected $fillable = ['title','author_id','published_location','publisher_id','published_year','book_year','category_id','classification_code','initial','source','no_induk','amount'];

    public function getTglTerdaftarAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }
    public function getNamaKategoriAttribute()
    {
        return $this->category ? $this->category->name : '';
    }
    public function author()
    {
      return $this->belongsTo('App\Author');
    }
    public function publisher()
    {
      return $this->belongsTo('App\Publisher');
    }
    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function borrowLogs()
    {
      return $this->hasMany('App\BorrowLog');
    }
    public function getStockAttribute()
    {
      $borrowed = $this->borrowLogs()->borrowed()->count();
      $stock = $this->amount - $borrowed;
      return $stock;
    }
    public static function boot()
    {
      parent::boot();
/*
 validation has done in UpdateBookRequest, this is just another option
      self::updating(function($book)
      {
        if ($book->amount < $book->borrowed) {
          Session::flash("flash_notification",[
            "level" => "danger",
            "message" => "Jumlah buku $book->title harus >= ".$book->borrowed
          ]);
          return false;
        }
      });
      */
      self::deleting(function ($book){
        if ($book->borrowLogs()->count() > 0) {
          Session::flash("flash_notification",[
            "level" => "danger",
            "message" => "$book->title tidak bisa dihapus karena masih memiliki data transaksi"
          ]);
          return false;
        }
      });

    }
    public function getBorrowedAttribute()
    {
      return $this->borrowLogs()->borrowed()->count();
    }

    public function getStuffAttribute($value)
{
    return $this->no_induk.' - '.$this->title;
}
}
