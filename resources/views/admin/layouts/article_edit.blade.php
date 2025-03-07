@extends('admin.layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="container mt-5">
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('admin.show.article.list') }}" style="text-decoration: none; color: black;">
                ← 戻る
            </a>
        </div>

        <h2 class="mb-4">お知らせ変更</h2>

        <form action="{{ route('admin.update.article', $article->id) }}" method="POST" class="form-horizontal article-edit-form" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group mb-4 d-flex align-items-center">
                <label for="posted_date" class="col-form-label" style="flex: 0 0 150px;">投稿日時</label>
                <input type="date" name="posted_date" id="posted_date" class="form-control" value="{{ old('posted_date', $article->posted_date) }}" style="flex: 1; border-radius: 0;" required>
                @if($errors->has('posted_date'))
                    <p class="text-danger">{{ $errors->first('posted_date') }}</p>
                @endif
            </div>

            <div class="form-group mb-4 d-flex align-items-center">
                <label for="title" class="col-form-label" style="flex: 0 0 150px;">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" style="flex: 1; border-radius: 0;" required>
                @if($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>

            <div class="form-group mb-4 d-flex align-items-center">
                <label for="article_contents" class="col-form-label" style="flex: 0 0 150px;">本文</label>
                <textarea name="article_contents" id="article_contents" class="form-control" rows="5" style="flex: 1; border-radius: 0;" required>{{ old('article_contents', $article->article_contents) }}</textarea>
                @if($errors->has('article_contents'))
                    <p class="text-danger">{{ $errors->first('article_contents') }}</p>
                @endif
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-dimgray text-white article-edit-button" style="width: 200px; height: 50px; border-radius: 0;">登録</button>
            </div>
        </form>
    </div>

    <!-- Custom Styles -->
    <style>
        .btn-dimgray {
            background-color: dimgray;
            color: white;
        }
        .btn-dimgray:hover {
            background-color: gray;
            color: white;
        }
        .text-danger {
            color: red;
        }
    </style>
@endsection
