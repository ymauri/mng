<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $e500
 * @property int $e200
 * @property int $e100
 * @property int $e50
 * @property int $e20
 * @property int $e10
 * @property int $e5
 * @property int $e2
 * @property int $e1
 * @property int $e050
 * @property int $e020
 * @property int $e010
 * @property int $e005
 * @property float $eind
 * @property float $waarvan
 * @property Cashclosure $cashclosure
 * @property Hotel $hotel
 * @property Reception $reception
 * @property Skybar $skybar
 */
class Bill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bill';

    /**
     * @var array
     */
    protected $fillable = ['e500', 'e200', 'e100', 'e50', 'e20', 'e10', 'e5', 'e2', 'e1', 'e050', 'e020', 'e010', 'e005', 'eind', 'waarvan'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cashclosure()
    {
        return $this->hasOne('App\Models\Cashclosure', 'bill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hotel()
    {
        return $this->hasOne('App\Models\Hotel', 'bill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reception()
    {
        return $this->hasOne('App\Models\Reception', 'bill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function skybar()
    {
        return $this->hasOne('App\Models\Skybar', 'bill_id');
    }
}
