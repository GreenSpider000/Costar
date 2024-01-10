<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Collection\Models\Subject;

class RecentSubjects extends Component
{
    public $limit;

    public function render()
    {
        $limit = $this->limit;

        $limit = $limit > 0 ? $limit : 5;

        $recentSubjects = Subject::recentlyPublished()->take($limit)->get();

        return view('livewire.recent-subjects', compact('recentSubjects'));
    }
}
