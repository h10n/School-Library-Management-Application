<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_induk', 20)->unique()->nullable();
            $table->string('name', 50)->nullable();
            $table->string('kelas', 10)->nullable();
            $table->string('jurusan', 20)->nullable();
            $table->string('jenis_anggota', 15)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('email', 60)->unique()->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('members');
    }
}
