<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrdersList extends Component
{
    public function render()
    {
        return view('livewire.admin-orders-list',[
            'orders'=>Order::orderBy('id','asc')->get()
        ]);
    }
}
