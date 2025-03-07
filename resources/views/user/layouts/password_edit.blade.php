@extends('user.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('user.show.profile') }}" style="text-decoration: none; color: black;">
            ← 戻る
        </a>
    </div>
    
    <h1>パスワード変更</h1>
    
    <form action="{{ route('user.password.update') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <label for="current_password" class="col-form-label">現在のパスワード</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
            @if($errors->has('current_password'))
                <p class="text-danger">{{ $errors->first('current_password') }}</p>
            @endif
        </div>

        <div class="form-group mb-4">
            <label for="new_password" class="col-form-label">新しいパスワード</label>
            <input type="password" class="form-control" id="new_password" name="new_password">
            @if($errors->has('new_password'))
                <p class="text-danger">{{ $errors->first('new_password') }}</p>
            @endif
        </div>

        <div class="form-group mb-4">
            <label for="new_password_confirmation" class="col-form-label">新しいパスワード（確認）</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
            @if($errors->has('new_password_confirmation'))
                <p class="text-danger">{{ $errors->first('new_password_confirmation') }}</p>
            @endif
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-coral text-white" style="background-color: coral; width: 200px; border-radius: 0;">変更</button>
        </div>
    </form>
</div>
@endsection
