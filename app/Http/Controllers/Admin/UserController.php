<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function usersList (Request $request)
    {
        $data = [
            'pageTitle'=>'User Management'
        ];
        return view('back.pages.admin.users-list',$data);
    }
}
