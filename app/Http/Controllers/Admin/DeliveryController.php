<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function showDelivery($id)
    {
        $delivery = Delivery::findOrFail($id);
        return view('admin.layouts.delivery', compact('delivery'));
    }
}