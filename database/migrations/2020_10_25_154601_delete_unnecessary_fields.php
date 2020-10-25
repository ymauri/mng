<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteUnnecessaryFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing', function(Blueprint $table){
            $table->dropColumn('pathimage');
            $table->dropColumn('status');
            $table->dropColumn('level');
            $table->dropColumn('updatedat');
        });

        Schema::table('listing', function(Blueprint $table){
            $table->timestamps();
        });

        Schema::table('help', function(Blueprint $table){
            $table->dropColumn('label');
        });

        Schema::table('help', function(Blueprint $table){
            $table->string('field')->unique()->change();
        });

        Schema::table('parameters', function(Blueprint $table){
            $table->dropColumn('valnumber');
            $table->dropColumn('isactive');
        });

        Schema::table('parameters', function(Blueprint $table){
            $table->string('type');
        });

        Schema::table('checkin', function(Blueprint $table){
            $table->renameColumn('Listing', 'listing');
            $table->renameColumn('Source', 'source');
            $table->dropColumn('date');
        });
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
