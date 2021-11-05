<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BorrowLog extends Model
{
    protected $appends = ['tgl_peminjaman', 'tgl_kembali', 'tgl_max', 'total_denda', 'status'];
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

    public function userReturned()
    {        
        return $this->belongsTo('App\User', 'user_returned_id');
    }

    public function member()
    {
      return $this->belongsTo('App\Member');
    }
    public function getTglPeminjamanAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }
    public function getTglMaxAttribute()
    {
        $setting = Setting::first();        
        return $this->created_at->addDays($setting->durasi)->format('d-m-Y');
    }

    public function getStatusAttribute()
    {        
      if ($this->is_returned){
        $status = 'Telah Dikembalikan Pada '.$this->updated_at->format('d-m-Y');
      }else{
        $status = 'Sedang Dipinjam';
      }
                    
        return $status;
    }
    public function getTotalDendaAttribute()
    {
        $setting = Setting::first();        
        
        $start_time =  $this->created_at;
        $finish_time = $this->is_returned ? $this->updated_at : Carbon::now();
        $result = $start_time->diffInDays($finish_time, false);
          if ($result > $setting->durasi) {
            $telat = $result - $setting->durasi;
            $total_denda = $telat * $setting->denda;
          }else {
            $total_denda = "0";
          }

          return $total_denda;
    }
    public function getTglKembaliAttribute()
    {
        return $this->updated_at->format('d-m-Y');
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
