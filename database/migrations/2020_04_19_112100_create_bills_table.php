<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('h_id');
            $table->integer('host_id');
            $table->integer('guest_id');
            $table->integer('n_person');
            $table->string('check_in');
            $table->string('check_out');
            $table->text('request_guest')->nullable();
            $table->integer('date_range');
            $table->integer('total');
            $table->tinyInteger('status');
            $table->tinyInteger('pay');
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
        Schema::dropIfExists('bills');
    }
}
