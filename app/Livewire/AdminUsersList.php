<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class AdminUsersList extends Component
{
    public function render()
    {
        return view('livewire.admin-users-list',[
            'users'=>Client::orderBy('id','asc')->get()
        ]);
    }
}
