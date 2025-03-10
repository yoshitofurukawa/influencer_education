<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function showBannerEdit()
    {
        return view('admin.layouts.banner_edit');
    }
}
