<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function showCurriculumList()
    {
        return view('user.layouts.curriculum_list');
    }
}
