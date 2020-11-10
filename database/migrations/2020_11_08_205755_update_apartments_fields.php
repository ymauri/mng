<?php

use App\Models\Listing;
use App\Models\Rule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateApartmentsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rules = DB::select('select * from rule');

        foreach ($rules as $rule) {
            $ruleObject = Rule::find($rule->id);
            if (!empty($ruleObject)) {
                $ruleObject->update([
                    'apartments'    => unserialize($rule->apartments),
                    'dayweek'       => unserialize($rule->dayweek),
                    'daysahead'  => !empty($rule->ishook) ? $rule->startingfrom : $rule->daysahead
                ]);
            }
        }

        Schema::table('rule', function (Blueprint $table) {
            $table->dropColumn('pricesbylisting');
            $table->dropColumn('pricesbytype');
            $table->dropColumn('bytype');
            $table->dropColumn('typeofapartment');
            $table->dropColumn('startingfrom');
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
