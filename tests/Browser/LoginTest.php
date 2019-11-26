<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Selamat Datang di Aplikasi Perpustakaan SMKN7 Samarinda, Silahkan Gunakan Username dan Password Anda Untuk Masuk ke Aplikasi!')
                    ->type('username', 'admin')
                    ->type('password','123456')
                    ->press('Login')                    
                    ->assertPathIs('/home');
        });
    }
}
