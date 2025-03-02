<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Grade;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class CurriculumController extends Controller
{
    public function showCurriculumList()
    {

        $curriculums = Curriculum::with('deliveryTimes')->get();
        $grades = Grade::all();

        $grade = null;


        return view('layouts.curriculum_list', compact('curriculums', 'grades', 'grade'));
    }


    public function showByGrade($grade_id)
    {
        $grades = Grade::all();

        $grade = Grade::findOrFail($grade_id);


        $curriculums = Curriculum::where('grade_id', $grade_id)->get();

        return view('layouts.curriculum_list', compact('grades', 'grade', 'curriculums'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate(
            [
                'grade_id' => 'required|exists:grades,id',
                'title' => 'required|string|max:255',
                'video_url' => 'required|url',
                'description' => 'required|string',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'thumbnail.image' => '有効な画像ファイルを選択してください。',
                'thumbnail.mimes' => 'ファイル形式は jpg、jpeg、png、bmp、gif、svg、webp のいずれかである必要があります。',
                'title.required' => '授業名は入力必須項目です。',
                'video_url.required' => '動画URLは入力必須項目です。',
                'description.required' => '授業概要は入力必須項目です。',
            ]
        );

        $curriculum = new Curriculum($validated);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $curriculum->thumbnail = basename($path);
        }

        $curriculum->save();



        return redirect()->route('show.curriculum.edit', $curriculum->id)->with('success', '授業を登録しました');
    }



    public function showCurriculumCreate()
    {

        $grades = Grade::all();

        return view('layouts.curriculum_create', compact('grades'));
    }



    public function showCurriculumEdit($id)
    {

        $curriculum = Curriculum::find($id);
        $grades = Grade::all();

        return view('layouts.curriculum_edit', compact('curriculum', 'grades'));
    }



    public function update(Request $request, $id)
    {
        $curriculum = Curriculum::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alway_delivery_flg' => 'required|boolean',
        ],[
            'thumbnail.image' => '有効な画像ファイルを選択してください。',
            'thumbnail.mimes' => 'ファイル形式は jpg、jpeg、png、bmp、gif、svg、webp のいずれかである必要があります。',
            'title.required' => '授業名は入力必須項目です。',
            'video_url.required' => '動画URLは入力必須項目です。',
            'description.required' => '授業概要は入力必須項目です。',
        ]);

        $curriculum->fill($validated);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $curriculum->thumbnail = basename($path);
        }

        $curriculum->save();

        return redirect()->route('curriculum_list', $curriculum->id)->with('success', '授業を更新しました');
    }
}
