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
        $rules = Rule::all();
        $listings = Listing::all();
        foreach ($rules as $rule) {
            $affectedListings = [];
            foreach ($listings as $listing) {
                if (strpos((string)$rule->apartments, $listing->idguesty) !== false) {
                    $affectedListings[] = $listing->idguesty;
                }
            }
            $rule->update([
                'apartments' => $affectedListings
            ]);
        }
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
