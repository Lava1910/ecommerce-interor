<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactList (Request $request)
    {
        $data = [
            'pageTitle'=>'Contact Management'
        ];
        return view('back.pages.admin.contact-list',$data);
    }
}
