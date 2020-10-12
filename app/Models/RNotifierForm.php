<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $notifier_id
 * @property string $body
 * @property string $status
 * @property int $form
 * @property string $date
 * @property string $subject
 * @property string $sendto
 * @property Notifier $notifier
 */
class RNotifierForm extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rnotifierform';

    /**
     * @var array
     */
    protected $fillable = ['notifier_id', 'body', 'status', 'form', 'date', 'subject', 'sendto'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notifier()
    {
        return $this->belongsTo('App\Models\Notifier');
    }
}
