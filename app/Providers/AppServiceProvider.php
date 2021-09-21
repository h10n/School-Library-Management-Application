<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Setting;
use Carbon\Carbon;
use  App\Announcement;
use Laravel\Dusk\DuskServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      require base_path().'/app/Helpers/frontend.php';

        \Validator::extend('passcheck', function ($attribute, $value, $parameters) {
          return \Hash::check($value, $parameters[0]);
        });

        View::composer('*', function ($view) {
          $perpus = Setting::all();
          foreach ($perpus as $perpustakan) {
          $nama_perpus = $perpustakan->name;
          $alamat_perpus = $perpustakan->address;
          $tentang = $perpustakan->about;
          $denda = $perpustakan->denda;
          $durasi = $perpustakan->durasi;
          $jumlah = $perpustakan->max_peminjaman;
          $logo = $perpustakan->logo;
          $kepala_perpustakaan = $perpustakan->kepala_perpustakaan;
          $nip_kepala_perpustakaan = $perpustakan->nip_kepala_perpustakaan;
          $pustakawan = $perpustakan->pustakawan;
          $nip_pustakawan = $perpustakan->nip_pustakawan;
          }
          $mytime = Carbon::now();
          $waktu = $mytime->formatLocalized('%A, %d %b %Y');
          $announcements = Announcement::all();
          $view->with(compact('nama_perpus','alamat_perpus','tentang','denda','durasi','logo','waktu','jumlah', 'announcements', 'kepala_perpustakaan', 'nip_kepala_perpustakaan', 'pustakawan', 'nip_pustakawan'));
      });
      
      setlocale(LC_ALL,'id_ID', 'id', 'ID');  
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
        $this->app->register(DuskServiceProvider::class);
    }
    }
}
