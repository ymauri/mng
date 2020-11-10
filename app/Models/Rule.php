<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $details
 * @property string $time
 * @property string $method
 * @property boolean $active
 * @property string $action
 * @property string $cond
 * @property string $conditionvalue
 * @property string $actionvalue
 * @property string $begin
 * @property string $ends
 * @property string $unit
 * @property int $daysahead
 * @property array $apartments
 * @property array $dayweek
 * @property int $priority
 * @property boolean $ishook
 * @property Rulelog[] $rulelogs
 */
class Rule extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rule';

    /**
     * @var array
     */
    protected $fillable = ['name', 'details', 'time', 'method', 'active', 'action', 'cond', 'conditionvalue', 'actionvalue', 'begin', 'ends', 'unit', 'daysahead', 'apartments', 'dayweek', 'priority', 'ishook'];

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
    public function rulelogs()
    {
        return $this->hasMany('App\Models\Rulelog');
    }

    public function getApartmentsAttribute() {
        return json_decode($this->attributes['apartments']);
    }
}
