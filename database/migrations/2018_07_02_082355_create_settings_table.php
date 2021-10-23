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
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('pengelola')->nullable();
            $table->string('kepala_perpustakaan')->nullable();
            $table->string('nip_kepala_perpustakaan')->nullable();
            // $table->string('pustakawan')->nullable();
            // $table->string('nip_pustakawan')->nullable();
            $table->string('about')->nullable();
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
