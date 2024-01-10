<?php

namespace Modules\Taxon\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxon extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'taxons';

    /**
     * Caegories has Many subjects.
     */
    public function subjects()
    {
        return $this->hasMany('Modules\Collection\Models\Subject');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Taxon\Database\factories\TaxonFactory::new();
    }
}
