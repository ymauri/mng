<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cleaning
 * @property string $updatedat
 * @property string $status
 * @property Cleaning $cleaning
 */
class CleaningLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cleaninglog';

    /**
     * @var array
     */
    protected $fillable = ['cleaning', 'updatedat', 'status'];

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
    public function cleaning()
    {
        return $this->belongsTo('App\Models\Cleaning', 'cleaning');
    }
}
