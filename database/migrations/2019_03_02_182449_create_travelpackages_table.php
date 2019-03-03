<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelpackages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_id');
            $table->integer('destination_id');
            $table->integer('subdestination_id');
            $table->string('package_name');
            $table->integer('days');
            $table->integer('nights');
            $table->integer('price');
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
        Schema::dropIfExists('travelpackages');
    }
}
