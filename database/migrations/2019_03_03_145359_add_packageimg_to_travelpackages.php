<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPackageimgToTravelpackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travelpackages', function($table){
            $table->string('package_img')->after('price');
            $table->string('alt_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travelpackages', function($table){
            $table->dropColumn('package_img');
            $table->dropColumn('alt_text');
        });
    }
}
