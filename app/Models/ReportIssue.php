<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $location_id
 * @property int $furniture_id
 * @property int $reporter_id
 * @property int $room_id
 * @property int $responsible_id
 * @property string $dated
 * @property string $reportedat
 * @property string $details
 * @property string $pathimage
 * @property string $priority
 * @property string $status
 * @property string $updatedat
 * @property Folder $folder
 * @property Worker $worker
 * @property Folder $folder
 * @property Furniture $furniture
 * @property Worker $worker
 */
class ReportIssue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportissue';

    /**
     * @var array
     */
    protected $fillable = ['location_id', 'furniture_id', 'reporter_id', 'room_id', 'responsible_id', 'dated', 'reportedat', 'details', 'pathimage', 'priority', 'status', 'updatedat'];

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
    public function room()
    {
        return $this->belongsTo('App\Models\Folder', 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsible()
    {
        return $this->belongsTo('App\Models\Worker', 'responsible_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder', 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function furniture()
    {
        return $this->belongsTo('App\Models\Furniture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo('App\Models\Worker', 'reporter_id');
    }
}
