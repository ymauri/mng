<?php

use App\Models\Hotel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HotelEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel', function(Blueprint $table){
            $table->float('websitemollie');
            $table->renameColumn('updated','updated_at');
            $table->renameColumn('finished','finished_at');
            $table->boolean('name')->change();
            $table->renameColumn('name','verified');
            $table->datetime('created_at')->after('dated');
        });

        Hotel::whereNotNull('verified')->update(['verified' =>true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel', function(Blueprint $table){
            $table->renameColumn('updated_at', 'updated');
            $table->renameColumn('finished_at', 'finished');
            $table->renameColumn('verified', 'name');
            $table->dropColumn('created_at');
            $table->dropColumn('websitemollie');
        });

        Schema::table('hotel', function(Blueprint $table){
            $table->string('name')->change();
        });
    }
}
