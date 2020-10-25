<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteUnnecessaryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('admin_trace');
        Schema::dropIfExists('business');
        Schema::dropIfExists('hotelparking');
        Schema::dropIfExists('Listing0');
        Schema::dropIfExists('Role');
        Schema::dropIfExists('User');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
