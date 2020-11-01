<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $listing
 * @property string $time
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $Source
 * @property int $nights
 * @property string $date
 * @property string $updatedat
 * @property string $confcode
 * @property int $guests
 * @property string $idguesty
 * @property string $status
 * @property Rcheckouthotel[] $rcheckouthotels
 */
class Checkout extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'checkout';

    /**
     * @var array
     */
    protected $fillable = ['listing', 'time', 'name', 'email', 'phone', 'source', 'nights', 'confcode', 'guests', 'idguesty', 'status'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcheckouthotels()
    {
        return $this->hasMany('App\Models\Rcheckouthotel');
    }
}
