<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('level');
            $table->string('username')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth')->nullable();
            $table->string('phone');
            $table->string('google')->nullable();
            $table->string('facebook')->nullable();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 0,
            'phone' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
