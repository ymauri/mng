<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $form
 * @property string $description
 * @property string $mails
 * @property string $externals
 * @property Rnotifierform[] $rnotifierforms
 */
class Notifier extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notifier';

    /**
     * @var array
     */
    protected $fillable = ['form', 'description', 'mails', 'externals'];

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
    public function rnotifierforms()
    {
        return $this->hasMany('App\Models\Rnotifierform');
    }
}
