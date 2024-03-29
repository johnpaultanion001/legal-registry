<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->boolean('isComplete')->default(false);
            $table->datetime('email_verified_at')->nullable();
            $table->date('subscribe_at')->default('2022-01-01');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
