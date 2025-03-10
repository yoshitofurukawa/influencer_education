<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ProgressController extends Controller
{
    public function showProgress()
    {
        $curriculums = Curriculum::all();
        $grades = Config::get('grades');
        $userGradeId = (int) auth()->user()->grade_id; // 型をキャスト

        // ユーザーの学年情報を取得
        $currentGrade = $grades[$userGradeId] ?? '学年情報が見つかりません';

        // 学年別の背景色を設定
        $gradeColors = [];
        foreach ($grades as $gradeId => $gradeName) {
            if ($gradeId <= 6) {
                $gradeColors[$gradeId] = 'paleturquoise'; // 小学校
            } elseif ($gradeId <= 9) {
                $gradeColors[$gradeId] = 'turquoise'; // 中学校
            } else {
                $gradeColors[$gradeId] = 'mediumspringgreen'; // 高校
            }
        }

        // 各カリキュラムの進捗情報を準備
        foreach ($curriculums as $curriculum) {
            $progress = $curriculum->progress()->where('users_id', auth()->id())->first();
            $curriculum->isCleared = $progress && $progress->clear_flg;
        }

        return view('user.layouts.curriculum_progress', compact('curriculums', 'currentGrade', 'grades', 'gradeColors', 'userGradeId'));
    }

}
