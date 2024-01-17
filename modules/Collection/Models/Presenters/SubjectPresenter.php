<?php

namespace Modules\Collection\Models\Presenters;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait SubjectPresenter
{
    public function getStatusFormattedAttribute()
    {
        switch ($this->status) {
            case '0':
                return '<span class="badge bg-danger">Unpublished</span>';
                break;

            case '1':
                if ($this->created_at >= Carbon::now()) {
                    return '<span class="badge bg-warning text-dark">Scheduled ('.$this->created_at_formatted.')</span>';
                }

                return '<span class="badge bg-success">Created</span>';
                break;

            case '2':
                return '<span class="badge bg-info">Draft</span>';
                break;

            default:
                return '<span class="badge bg-primary">Status:'.$this->status.'</span>';
                break;
        }
    }
}
