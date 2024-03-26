<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class AdminProjectsList extends Component
{
    public function render()
    {
        return view('livewire.admin-projects-list',[
            'projects'=>Project::orderBy('id','asc')->get()
        ]);
    }
}
