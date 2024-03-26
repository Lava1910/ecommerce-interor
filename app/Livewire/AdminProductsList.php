<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AdminProductsList extends Component
{
    public function render()
    {
        return view('livewire.admin-products-list',[
            'products'=>Product::orderBy('id','asc')->get()
        ]);
    }
}
