<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('publisher_id')->unsigned()->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('published_location')->nullable();
            $table->string('classification_code')->nullable();
            $table->char('initial',1)->nullable();
            $table->char('source',1)->nullable();
            $table->string('no_induk',60)->unique()->nullable();
            $table->integer('amount')->unsigned()->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();




        });
          DB::statement("ALTER TABLE books ADD published_year YEAR NOT NULL");
          DB::statement("ALTER TABLE books ADD book_year YEAR NOT NULL");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
