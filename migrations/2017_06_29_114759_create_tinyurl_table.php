<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinyurlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinyurl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->nullable();
            $table->string('title');
            $table->string('url', 10000);
            $table->string('hash', 16)->unique();
            $table->integer('count', false, true)->default(0);
            $table->enum('privacy', ['guest', 'users', 'self', 'password'])->default('guest');
            $table->string('password')->nullable();
            $table->timestamps();
            $table->dateTime('expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinyurl');
    }
}
