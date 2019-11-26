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
          }
          $mytime = Carbon::now();
          $waktu = $mytime->format('l, d M Y');
          $announcements = Announcement::all();
          $view->with(compact('nama_perpus','alamat_perpus','tentang','denda','durasi','logo','waktu','jumlah', 'announcements'));
      });
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
