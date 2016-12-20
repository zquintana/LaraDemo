<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Band
 */
class Band extends Model
{
    use Sortable;

    public $sortable = [
        'name', 'start_date', 'website', 'still_active',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'start_date', 'website', 'still_active',
    ];

    /**
     * @return HasMany
     */
    public function albums()
    {
        return $this->hasMany('App\Model\Album');
    }
}
