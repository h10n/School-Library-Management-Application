<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowLog extends Model
{
    protected $appends = ['tgl_peminjaman'];
    protected $fillable = ['book_id','member_id','user_id','is_returned'];
    protected $casts = ['is_returned' => 'boolean'];
    public function book()
    {
      return $this->belongsTo('App\Book');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function member()
    {
      return $this->belongsTo('App\Member');
    }
    public function getTglPeminjamanAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }
    public function scopeReturned($query)
    {
      return $query->where('is_returned',1);
    }
    public function scopeBorrowed($query)
    {
      return $query->where('is_returned',0);
    }
}
