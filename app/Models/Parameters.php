<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $variable
 * @property string $valstring
 * @property boolean $isactive
 * @property float $valnumber
 * @property string $label
 */
class Parameters extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['variable', 'valstring', 'isactive', 'valnumber', 'label'];

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
