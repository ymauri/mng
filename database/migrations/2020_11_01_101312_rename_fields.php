<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RenameFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkout', function(Blueprint $table){
            $table->renameColumn('Source', 'source');
            $table->dropColumn('date');
        });

        Schema::table('checkin', function(Blueprint $table){
            $table->timestamps();
        });

        Schema::table('checkout', function(Blueprint $table){
            $table->timestamps();
        });

        DB::table('checkin')->update([
            'updated_at' => Carbon::now()->format("Y-m-d H:i:s"),
            'created_at' => Carbon::now()->format("Y-m-d H:i:s")
        ]);

        DB::table('checkout')->update([
            'updated_at' => Carbon::now()->format("Y-m-d H:i:s"),
            'created_at' => Carbon::now()->format("Y-m-d H:i:s")
        ]);

        Schema::table('checkin', function(Blueprint $table){
            $table->dropColumn('updatedat');
        });

        Schema::table('checkout', function(Blueprint $table){
            $table->dropColumn('updatedat');
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
