<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function showProgress()
    {
        $curriculums = Curriculum::all();
        return view('user.layouts.curriculum_progress', compact('curriculums'));
    }
}
