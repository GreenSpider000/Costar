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
                return '<span class="badge bg-danger">'.__("Unpublished").'</span>';
                break;

            case '1':
                if ($this->created_at >= Carbon::now()) {
                    return '<span class="badge bg-warning text-dark">'.__("Scheduled").'('.$this->created_at_formatted.')</span>';
                }

                return '<span class="badge bg-success">'.__("Published").'</span>';
                break;

            case '2':
                return '<span class="badge bg-info">'.__("Draft").'</span>';
                break;

            default:
                return '<span class="badge bg-primary">'.__("Status").':'.$this->status.'</span>';
                break;
        }
    }
}
