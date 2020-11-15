<?php

namespace App\Repositories;

use App\Models\Rule;

class RuleRepository {

    /**
     * Returns active rules
     * @return Collection
     */
    public function activeRules() {
        return Rule::where('active', 1)->get();
    }

}
