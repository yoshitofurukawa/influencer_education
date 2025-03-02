<?php

namespace App\Http\Controllers;

use App\Models\DeliveryTime;
use App\Models\Curriculum;
use App\Models\Grade;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function showDeliveryEdit($id)
    {
        $delivery = DeliveryTime::where('curriculums_id', $id)->first();

        $curriculum = Curriculum::with('deliveryTimes')->findOrFail($id);
        $grade = $curriculum->grade;

        return view('layouts.delivery_edit', compact('delivery', 'curriculum', 'grade'));
    }




    public function update(Request $request, $id)
{
    $request->validate([
        'delivery_from.*' => ['required', 'date'],
        'delivery_from_time.*' => ['required', 'date_format:H:i'],
        'delivery_to.*' => ['required', 'date', 'after_or_equal:delivery_from.*'],
        'delivery_to_time.*' => ['required', 'date_format:H:i'],
    ]);

    $curriculum = Curriculum::findOrFail($id);

    // 既存の配信日時を削除
    $curriculum->deliveryTimes()->delete();


    if (!is_array($request->delivery_from)) {
        return redirect()->back()->withErrors(('配信日時が正しく入力されていません'));
    }
    // 新しい配信日時を登録
    foreach ($request->delivery_from as $index => $from) {
        $curriculum->deliveryTimes()->create([
            'delivery_from' => $from,
            'delivery_from_time' => $request->delivery_from_time[$index],
            'delivery_to' => $request->delivery_to[$index],
            'delivery_to_time' => $request->delivery_to_time[$index],
        ]);
    }

    return redirect()->route('curriculum_list')->with('success', '配信日時を更新しました');






        // 既存の配信日時を削除
        $curriculum->deliveryTimes()->delete();


        // 新しいデータを保存
        foreach ($request->delivery_from as $index => $fromDate) {
            // 各データが存在するかチェック
            if (!isset($request->delivery_from_time[$index], $request->delivery_to[$index], $request->delivery_to_time[$index])) {
                continue; // データが足りなかったらスキップ
            }

            $delivery = new DeliveryTime();
            $delivery->curriculums_id = $id;
            $delivery->delivery_from = $fromDate . ' ' . $request->delivery_from_time[$index]; // 日付 + 時間
            $delivery->delivery_to = $request->delivery_to[$index] . ' ' . $request->delivery_to_time[$index]; // 日付 + 時間
            $delivery->save();

        }

        return redirect()->route('curriculum_list')->with('success', '配信日時を更新しました！');
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery_from.*' => ['required', 'date'],
            'delivery_from_time.*' => ['required', 'date_format:H:i'],
            'delivery_to.*' => ['required', 'date', 'after_or_equal:delivery_from.*'],
            'delivery_to_time.*' => ['required', 'date_format:H:i'],
        ]);

        // 配信日時を保存する処理
        DeliveryTime::create([
            'curriculum_id' => $request->curriculum_id,
            'delivery_from' => $request->delivery_from,
            'delivery_from_time' => $request->delivery_from_time,
            'delivery_to' => $request->delivery_to,
            'delivery_to_time' => $request->delivery_to_time,
        ]);

        return redirect()->route('curriculum_list')->with('success', '配信日時を登録しました');
    }


    public function show($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        // 常時公開ならそのまま閲覧OK
        if ($curriculum->alway_delivery_flg == 1) {
            return view('curriculum.show', compact('curriculum'));
        }

        // 配信日時内かどうかをチェック
        $now = now();
        $delivery = DeliveryTime::where('curriculums_id', $id)
            ->where('delivery_from', '<=', $now)
            ->where('delivery_to', '>=', $now)
            ->first();

        if ($delivery) {
            return view('curriculum.show', compact('curriculum'));
        }

        // どちらの条件にも当てはまらない場合は403エラー
        abort(403, 'このカリキュラムは現在閲覧できません');
    }
}
