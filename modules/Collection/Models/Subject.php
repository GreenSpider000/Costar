<?php

namespace Modules\Collection\Models;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Modules\Collection\Models\Presenters\SubjectPresenter;
use Modules\Taxon\Models\Taxon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Subject extends BaseModel
{
    use HasFactory;
    use LogsActivity;
    use Notifiable;
    use SubjectPresenter;
    use SoftDeletes;

    protected $table = 'subjects';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName($this->table);
    }

    public function taxon()
    {
        return $this->belongsTo('Modules\Taxon\Models\Taxon');
    }

    public function setTaxonIdAttribute($value)
    {
        $this->attributes['taxon_id'] = $value;

        try {
            $taxon = Taxon::findOrFail($value);
            $this->attributes['taxon_name'] = $taxon->name;
        } catch (\Exception $e) {
            $this->attributes['taxon_name'] = null;
        }
    }

    public function setCreatedByNameAttribute($value)
    {
        $this->attributes['created_by_name'] = trim(label_case($value));

        if (empty($value)) {
            $this->attributes['created_by_name'] = auth()->user()->name;
        }
    }

    /**
     * Set the 'meta title'.
     * If no value submitted use the 'Title'.
     *
     * @param [type]
     */
    public function setMetaTitleAttribute($value)
    {
        $this->attributes['meta_title'] = trim(ucwords($value));

        if (empty($value)) {
            $this->attributes['meta_title'] = trim(ucwords($this->attributes['name']));
        }
    }

    /**
     * Set the 'meta description'
     * If no value submitted use the default 'meta_description'.
     *
     * @param [type]
     */
    public function setMetaDescriptionAttribute($value)
    {
        $this->attributes['meta_description'] = $value;

        if (empty($value)) {
            $this->attributes['meta_description'] = setting('meta_description');
        }
    }

    /**
     * Get the list of Recently Published Collections.
     *
     * @param [type] $query [description]
     * @return [type] [description]
     */
    public function scopeRecentlyPublished($query)
    {
        return $query->where('status', '=', '1')
            ->whereDate('created_at', '<=', Carbon::today()->toDateString())
            ->orderBy('created_at', 'desc');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Collection\Database\Factories\SubjectFactory::new();
    }
}
