<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $rule_id
 * @property string $checkin
 * @property string $listing
 * @property int $oldprice
 * @property Rule $rule
 */
class RuleLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rulelog';

    /**
     * @var array
     */
    protected $fillable = ['rule_id', 'checkin', 'listing', 'oldprice'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rule()
    {
        return $this->belongsTo('App\Models\Rule');
    }
}
