<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class AdminNewsList extends Component
{
    public function render()
    {
        return view('livewire.admin-news-list',[
            'news'=>News::orderBy('id','asc')->get()
        ]);
    }
}
