<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        // トランザクション開始
        DB::beginTransaction();
        try {
            if ($user->updateProfile($request)) {
                DB::commit(); // 成功したらコミット
                return redirect()->route('user.show.profile')->with('success', 'プロフィールが更新されました。');
            } else {
                DB::rollBack(); // 失敗したらロールバック
                return redirect()->route('user.show.profile')->with('error', 'プロフィールの更新中にエラーが発生しました。');
            }
        } catch (\Exception $e) {
            DB::rollBack(); // 例外発生時もロールバック
            return redirect()->route('user.show.profile')->with('error', '予期しないエラーが発生しました: ' . $e->getMessage());
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

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 現在のパスワードが一致しているか確認
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => '現在のパスワードが違います。']);
            }

            // 新しいパスワードを設定
            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::commit(); // 成功したらコミット
            return redirect()->route('user.show.profile')->with('status', 'パスワードが変更されました。');
        } catch (\Exception $e) {
            DB::rollBack(); // 例外発生時はロールバック
            return redirect()->route('user.show.profile')->with('error', '予期しないエラーが発生しました: ' . $e->getMessage());
        }
    }
}
