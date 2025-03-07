@extends('admin.layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="container mt-5">
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('admin.show.top') }}" style="text-decoration: none; color: black;">
                ← 戻る
            </a>
        </div>

        <h2 class="mb-4">お知らせ一覧</h2>

        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('admin.show.article.create') }}" class="btn btn-teal text-white">新規登録</a>
        </div>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>投稿日時</th>
                    <th>タイトル</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <a href="{{ route('admin.show.article.edit', $article->id) }}" class="btn btn-teal btn-sm text-white mx-1">変更する</a> <!-- 編集ページへのリンク -->
                            <form method="POST" action="{{ route('admin.delete.article', $article->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Custom Styles -->
    <style>
        .btn-teal {
            background-color: #008080;
            color: white;
        }
        .btn-teal:hover {
            background-color: #006666;
            color: white;
        }
        .table-borderless th {
            font-weight: normal; /* ヘッダの太字を無効にする */
        }
    </style>
@endsection
