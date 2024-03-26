<?php

namespace App\Livewire;

use App\Models\ProjectCategory;
use Livewire\Component;

class AdminProjectCategoriesList extends Component
{
    public function render()
    {
        return view('livewire.admin-project-categories-list',[
            'projectCategories'=>ProjectCategory::orderBy('id','asc')->get()
        ]);
    }
}
