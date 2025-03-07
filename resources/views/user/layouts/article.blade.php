@extends('user.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('user.show.top') }}" style="text-decoration: none; color: black; position: relative; top: 10px;">
            ← 戻る
        </a>
    </div>
    <div>
        <p>{{ $article->posted_date->format('Y年m月d日') }}</p>
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->article_contents }}</p>
    </div>
</div>
@endsection
