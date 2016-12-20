<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Album
 */
class Album extends Model
{
    use Sortable;

    /**
     * @var array
     */
    public $sortable = [
        'name', 'recorded_date', 'release_date', 'number_of_tracks',
        'label', 'producer', 'genre', 'band_id',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'recorded_date', 'release_date', 'number_of_tracks',
        'label', 'producer', 'genre', 'band_id',
    ];

    /**
     * @return BelongsTo
     */
    public function band()
    {
        return $this->belongsTo('App\Model\Band');
    }
}
