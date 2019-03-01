<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('destinations', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->timestamps();
        // });
        // Schema::table('destinations', function($table){
        //     $table->string('name');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('destinations');
        // Schema::table('destinations', function($table){
        //     $table->dropColumn('name');
        // });
    }
}
