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

        <form action="{{ route('curriculum.update', ['id' => $curriculum->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($curriculum->thumbnail)
                <div class="mb-3">
                    <label>サムネイル</label><br>
                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">

                    @if (Str::startsWith($curriculum->thumbnail, 'http'))
                        {{-- 外部URLの場合 --}}
                        <img src="{{ $curriculum->thumbnail }}" alt="サムネイル" width="250" height="200">
                    @else
                        {{-- ローカルストレージの画像を表示 --}}
                        <img src="{{ asset('storage/thumbnails/' . $curriculum->thumbnail) }}" alt="サムネイル">
                    @endif
                </div>
            @endif


            <div class="row">
                <div class="col-md-3 text-end">
                    <label for="grade" class="form-label">学年</label>
                </div>
                <div class="col-md-9">
                    <select name="grade" id="grade" class="form-control">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" {{ $curriculum->grade_id == $grade->id ? 'selected' : '' }}>
                                {{ $grade->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-3 text-end">
                    <label for="title" class="form-label">授業名</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $curriculum->title }}">
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-md-3 text-end">
                    <label for="video_url" class="form-label">動画URL</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="video_url"
                        value="{{ old('video_url', $curriculum->video_url) }}">
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-md-3 text-end">
                    <label for="description" class="form-label">授業概要</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" id="description" name="description">{{ $curriculum->description }}</textarea>
                </div>
            </div>


            <input type="hidden" name="alway_delivery_flg" value="0">

            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <label>
                        <input type="checkbox" name="alway_delivery_flg" value="1"
                            {{ $curriculum->alway_delivery_flg ? 'checked' : '' }}>常時公開
                    </label>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success">登録</button>
                </div>
            </div>
        </form>
    </div>
@endsection
