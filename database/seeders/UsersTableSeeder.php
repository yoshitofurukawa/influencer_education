<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Test User',
            'name_kana' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // パスワードはハッシュ化して保存
            'profile_image' => null,
            'grade_id' => 1
        ]);
    }
}
