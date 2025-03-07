@extends('admin.layouts.app')

@section('content')
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

<div class="container">
    <h1 class="mb-4">これは管理者授業新規登録ページ</h1>
</div>
@endsection
