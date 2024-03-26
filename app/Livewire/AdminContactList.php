<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class AdminContactList extends Component
{
    public function render()
    {
        return view('livewire.admin-contact-list',[
            'contacts'=>Contact::get()
        ]);
    }
}
