<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $furniture_id
 * @property int $folder_id
 * @property string $details
 * @property string $pathimage
 * @property string $priority
 * @property string $status
 * @property string $frequency
 * @property string $updated
 * @property string $begins
 * @property string $ends
 * @property Folder $folder
 * @property Furniture $furniture
 */
class ReportPlanning extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportplanning';

    /**
     * @var array
     */
    protected $fillable = ['furniture_id', 'folder_id', 'details', 'pathimage', 'priority', 'status', 'frequency', 'updated', 'begins', 'ends'];

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
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function furniture()
    {
        return $this->belongsTo('App\Models\Furniture');
    }
}
