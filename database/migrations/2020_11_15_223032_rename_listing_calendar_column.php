<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameListingCalendarColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listingcalendar', function(Blueprint $table){
            $table->dropColumn('upated_at');
            $table->dropColumn('created_at');
        });
        Schema::table('listingcalendar', function(Blueprint $table){
            $table->string('rule')->change();
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
        Schema::table('listingcalendar', function(Blueprint $table){
            $table->dateTime('upated_at');
            $table->dropColumn('updated_at');
            $table->string('rule')->change();
        });
    }
}
