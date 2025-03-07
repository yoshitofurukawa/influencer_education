<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // プロフィール表示メソッド
    public function showProfileForm()
    {
        return view('user.layouts.profile_edit');
    }

    // プロフィール更新メソッド
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if ($user->updateProfile($request)) {
            return redirect()->route('user.show.profile')->with('success', 'プロフィールが更新されました。');
        } else {
            return redirect()->route('user.show.profile')->with('error', 'プロフィールの更新中にエラーが発生しました。');
        }
    }

    // パスワード変更画面表示メソッド
    public function showPasswordForm()
    {
        return view('user.layouts.password_edit');
    }

    // パスワード変更処理メソッド
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        // 現在のパスワードが一致しているか確認
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => '現在のパスワードが違います。']);
        }

        // 新しいパスワードを設定
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.show.profile')->with('status', 'パスワードが変更されました。');
    }
}
