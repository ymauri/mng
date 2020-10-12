<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $e20
 * @property int $e10
 * @property int $e5
 * @property int $e2
 * @property int $e1
 * @property int $e050
 * @property int $e020
 * @property int $e010
 * @property int $s20
 * @property int $s10
 * @property int $s5
 * @property int $s2
 * @property int $s1
 * @property int $s050
 * @property int $s020
 * @property int $s010
 * @property float $total
 * @property boolean $extra
 * @property boolean $standard
 * @property boolean $hascash
 * @property Cashclosure $cashclosure
 * @property Reception $reception
 * @property Skybar $skybar
 */
class BeginBill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beginbill';

    /**
     * @var array
     */
    protected $fillable = ['e20', 'e10', 'e5', 'e2', 'e1', 'e050', 'e020', 'e010', 's20', 's10', 's5', 's2', 's1', 's050', 's020', 's010', 'total', 'extra', 'standard', 'hascash'];

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
        return $this->hasOne('App\Models\Cashclosure', 'beginbill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reception()
    {
        return $this->hasOne('App\Models\Reception', 'beginbill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function skybar()
    {
        return $this->hasOne('App\Models\Skybar', 'beginbill_id');
    }
}
