@extends('user.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('user.show.top') }}" style="text-decoration: none; color: black;">
            ← 戻る
        </a>
    </div>
    
    <!-- プロフィール変更のテキストを表示 -->
    <h1>プロフィール変更</h1>
    
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4 d-flex">
            <!-- 現在のプロフィール画像を表示 -->
            <div>
                @if(Auth::user()->profile_image)
                    <img src="{{ asset('storage/images/profile/' . Auth::user()->profile_image) }}" alt="プロフィール画像" style="width: 150px; height: 150px; object-fit: cover; margin-right: 20px;">
                @else
                    <img src="{{ asset('storage/images/noimage.png') }}" alt="代替画像" style="width: 150px; height: 150px; object-fit: cover; margin-right: 20px;">
                @endif
            </div>
            <div class="d-flex flex-column">
                <label for="profile_image" style="font-size: 1.25rem;">プロフィール画像</label>
                <input type="file" class="form-control-file mt-2" id="profile_image" name="profile_image">
                @if($errors->has('profile_image'))
                    <p class="text-danger">{{ $errors->first('profile_image') }}</p>
                @endif
            </div>
        </div>
        
        <div class="form-group mb-4 d-flex align-items-center">
            <label for="name" class="col-form-label" style="flex: 0 0 150px;">ユーザーネーム</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" style="flex: 1; border-radius: 0;">
            @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>
        
        <div class="form-group mb-4 d-flex align-items-center">
            <label for="name_kana" class="col-form-label" style="flex: 0 0 150px;">カナ</label>
            <input type="text" class="form-control" id="name_kana" name="name_kana" value="{{ Auth::user()->name_kana }}" style="flex: 1; border-radius: 0;">
            @if($errors->has('name_kana'))
                <p class="text-danger">{{ $errors->first('name_kana') }}</p>
            @endif
        </div>
        
        <div class="form-group mb-4 d-flex align-items-center">
            <label for="email" class="col-form-label" style="flex: 0 0 150px;">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" style="flex: 1; border-radius: 0;">
            @if($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>
        
        <div class="form-group mb-4 d-flex align-items-center">
            <label for="password" class="col-form-label" style="flex: 0 0 150px;">パスワード</label>
            <input type="button" class="btn btn-outline-secondary" value="パスワードを変更する" onclick="location.href='{{ route('user.show.password.edit') }}'" style="background-color: white; color: black; border-radius: 0;">
            @if($errors->has('current_password'))
                <p class="text-danger">{{ $errors->first('current_password') }}</p>
            @endif
        </div>
        
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-coral text-white" style="background-color: coral; width: 200px; border-radius: 0;">登録</button>
        </div>
    </form>
</div>
@endsection
