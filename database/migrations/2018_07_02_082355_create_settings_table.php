<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('website', 60)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('pengelola', 100)->nullable();
            $table->string('kepala_perpustakaan', 50)->nullable();
            $table->string('nip_kepala_perpustakaan', 20)->nullable();
            // $table->string('pustakawan')->nullable();
            // $table->string('nip_pustakawan')->nullable();
            $table->string('about', 100)->nullable();
            $table->integer('denda')->nullable();
            $table->integer('durasi')->nullable();
		    $table->integer('max_peminjaman')->nullable();
            $table->text('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
