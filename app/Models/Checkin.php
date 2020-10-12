<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $Listing
 * @property string $name
 * @property string $time
 * @property string $updatedat
 * @property string $email
 * @property string $phone
 * @property string $Source
 * @property int $nights
 * @property int $guests
 * @property string $confcode
 * @property string $date
 * @property string $idguesty
 * @property string $status
 * @property float $betalen
 * @property float $voldan
 * @property string $note
 * @property string $canceledat
 * @property Rcheckinhotel[] $rcheckinhotels
 */
class Checkin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'checkin';

    /**
     * @var array
     */
    protected $fillable = ['Listing', 'name', 'time', 'updatedat', 'email', 'phone', 'Source', 'nights', 'guests', 'confcode', 'date', 'idguesty', 'status', 'betalen', 'voldan', 'note', 'canceledat'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcheckinhotels()
    {
        return $this->hasMany('App\Models\Rcheckinhotel');
    }
}
