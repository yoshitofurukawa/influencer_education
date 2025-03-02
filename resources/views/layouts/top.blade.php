@extends('layouts.app')

@section('content')
    <div class="card w-50 mx-auto text-center">
        @if (Auth::check())
            <p>ユーザーネーム：{{ Auth::user()->name }}</p>
            <p>メールアドレス:{{ Auth::user()->email }}</p>
        @else
            <p>ログインしてください</p>
        @endif
    </div>
@endsection
