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

    public function tags()
    {
        return $this->morphToMany('Modules\Tag\Models\Tag', 'taggable');
    }

    /**
     * Get all of the subject's comments.
     */
    public function comments()
    {
        return $this->morphMany('Modules\Comment\Models\Comment', 'commentable')->where('status', '=', 1);
    }

    /**
     * All the Published and Unpublished Comments.
     */
    public function comments_all()
    {
        return $this->hasMany('Modules\Collection\Models\Comment');
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
     * Set the meta meta_og_image
     * If no value submitted use the 'Title'.
     *
     * @param [type]
     */
    public function setMetaOgImageAttribute($value)
    {
        $this->attributes['meta_og_image'] = $value;

        if (empty($value)) {
            if (isset($this->attributes['featured_image'])) {
                $this->attributes['meta_og_image'] = $this->attributes['featured_image'];
            } else {
                $this->attributes['meta_og_image'] = setting('meta_image');
            }
        }
    }

    /**
     * Set the published at
     * If no value submitted use the 'Title'.
     *
     * @param [type]
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value;

        if (empty($value) && $this->attributes['status'] === 1) {
            $this->attributes['published_at'] = Carbon::now();
        }
    }

    /**
     * Get the list of Published Collections.
     *
     * @param [type] $query [description]
     * @return [type] [description]
     */
    public function scopePublished($query)
    {
        return $query->where('status', '=', '1')
            ->where('published_at', '<=', Carbon::now());
    }

    public function scopePublishedAndScheduled($query)
    {
        return $query->where('status', '=', '1');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', '=', 'Yes')
            ->where('status', '=', '1')
            ->where('published_at', '<=', Carbon::now());
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
            ->whereDate('published_at', '<=', Carbon::today()->toDateString())
            ->orderBy('published_at', 'desc');
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
