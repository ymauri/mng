<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $e500
 * @property float $e200
 * @property float $e100
 * @property float $e50
 * @property float $e20
 * @property float $e10
 * @property float $e5
 * @property float $waarde
 * @property float $contant
 * @property float $kasverschil
 * @property float $type
 * @property float $bank1
 * @property float $bank2
 * @property float $bank3
 * @property float $bank4
 * @property float $totalmoney
 * @property array $bank
 * @property Kasboekhotel $kasboekhotel
 */
class KasboekHotelFloat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekhotelfloat';

    /**
     * @var array
     */
    protected $fillable = ['e500', 'e200', 'e100', 'e50', 'e20', 'e10', 'e5', 'waarde', 'contant', 'kasverschil', 'type', 'bank1', 'bank2', 'bank3', 'bank4', 'totalmoney', 'bank'];

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
    public function kasboekhotel()
    {
        return $this->hasOne('App\Models\Kasboekhotel', 'float_id');
    }
}
