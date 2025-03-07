@extends('user.layouts.app')

@section('content')
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

<div class="container">
    <h1 class="mb-4">これはユーザー配信ページ</h1>
</div>
@endsection
