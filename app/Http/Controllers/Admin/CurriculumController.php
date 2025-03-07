<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CurriculumController extends Controller
{
    public function showCurriculumList()
    {
        return view('admin.layouts.curriculum_list');
    }
}
