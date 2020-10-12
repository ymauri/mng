<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $position
 * @property boolean $isactive
 * @property Cashclosure[] $cashclosures
 * @property Cashclosure[] $cashclosures
 * @property Hotel[] $hotels
 * @property Log[] $logs
 * @property Log[] $logs
 * @property Log[] $logs
 * @property Log[] $logs
 * @property Log[] $logs
 * @property Reception[] $receptions
 * @property Reception[] $receptions
 * @property Reportissue[] $reportissues
 * @property Reportissue[] $reportissues
 * @property Skybar[] $skybars
 * @property Skybar[] $skybars
 */
class Worker extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'worker';

    /**
     * @var array
     */
    protected $fillable = ['name', 'position', 'isactive'];

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


}
