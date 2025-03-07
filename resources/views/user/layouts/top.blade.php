@extends('user.layouts.app')

@section('content')
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="container">
        <h1 class="mb-4">これはユーザートップページ</h1>

        <!-- バナー画像 -->
        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('path/to/your/banner/image.jpg') }}" alt="バナー画像" style="width: 100%; height: auto; max-width: 1000px;">
        </div>

        <!-- お知らせ -->
        <div class="mt-5">
            <h2 class="mb-4">お知らせ</h2>
            @foreach($articles as $article)
                <div class="mb-3">
                    <a href="{{ route('user.show.article', ['id' => $article->id]) }}" style="text-decoration: none; color: black;">
                        @php
                            $postedDate = \Carbon\Carbon::parse($article->posted_date);
                        @endphp
                        <p><strong>{{ $postedDate->format('Y年m月d日') }}</strong> - {{ $article->title }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
