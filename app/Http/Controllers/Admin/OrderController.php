<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ordersList (Request $request)
    {
        $data = [
            'pageTitle'=>'Orders Management'
        ];
        return view('back.pages.admin.orders-list',$data);
    }
}
