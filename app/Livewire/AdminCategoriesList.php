<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class AdminCategoriesList extends Component
{
    public function render()
    {
        return view('livewire.admin-categories-list',[
            'categories'=>Category::orderBy('id','asc')->get()
        ]);
    }
}
