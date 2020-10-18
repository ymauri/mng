<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $listing_id
 * @property string $name
 * @property string $email
 * @property string $details
 * @property string $checkin
 * @property string $phone
 * @property Listing $listing
 */
class BlackList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blacklist';

    /**
     * @var array
     */
    protected $fillable = ['listing_id', 'name', 'email', 'details', 'checkin', 'phone'];

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
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
