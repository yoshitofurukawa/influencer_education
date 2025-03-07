<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function showDelivery()
    {
        return view('user.layouts.delivery');
    }
}
