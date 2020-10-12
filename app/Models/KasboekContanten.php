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
 * @property float $e2
 * @property float $e1
 * @property float $e050
 * @property float $e020
 * @property float $e010
 * @property float $e005
 * @property float $e002
 * @property float $e001
 * @property float $total
 * @property float $type
 * @property Kasboek $kasboek
 * @property Kasboek $kasboek
 * @property Kasboek $kasboek
 * @property Kasboek $kasboek
 */
class KasboekContanten extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekcontanten';

    /**
     * @var array
     */
    protected $fillable = ['e500', 'e200', 'e100', 'e50', 'e20', 'e10', 'e5', 'e2', 'e1', 'e050', 'e020', 'e010', 'e005', 'e002', 'e001', 'total', 'type'];

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
    public function los()
    {
        return $this->hasOne('App\Models\Kasboek', 'los_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rol()
    {
        return $this->hasOne('App\Models\Kasboek', 'rol_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bedrag()
    {
        return $this->hasOne('App\Models\Kasboek', 'bedrag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function waarde()
    {
        return $this->hasOne('App\Models\Kasboek', 'waarde_id');
    }
}
