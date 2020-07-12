<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id');
            $table->integer('host_id');
            $table->string('utilities',2000);
            $table->string('types',2000);
            $table->string('name');
            $table->string('address');
            $table->integer('district_id');
            $table->string('n_room');
            $table->string('n_bed');
            $table->string('n_bath');
            $table->string('max_guest');
            $table->longText('description');
            $table->longText('rules');
            $table->tinyInteger('status');
            $table->tinyInteger('h_status');
            $table->string('trip_type');
            $table->string('price');
            $table->string('exGuest_fee');
            $table->string('min_night');
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
        Schema::dropIfExists('houses');
    }
}
