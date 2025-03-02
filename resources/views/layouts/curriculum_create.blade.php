@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('curriculum_list') }}" class="text-blue-500 text-sm">&lt; 戻る</a>

        <h2>授業設定</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('curriculum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="grade">学年</label>
                <select name="grade_id" id="grade_id" class="form-control">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ old('grade') == $grade->id ? 'selected' : '' }}>
                            {{ $grade->name }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="title" class="form-label">授業名</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">サムネイル</label>
                <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="video_url" class="form-label">動画URL</label>
                <input type="text" name="video_url" value="{{ old('video_url') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">授業概要</label>
                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">登録</button>

        </form>
    </div>
@endsection
