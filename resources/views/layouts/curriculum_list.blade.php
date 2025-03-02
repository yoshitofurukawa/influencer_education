@extends('layouts.app')

@section('content')
    <!-- ヘッダー部分 -->


    <div class="container mx-auto d-flex w-100">
        <div class="container mx-auto d-flex w-100">
            <!-- サイドメニュー -->
            <div class="col-md-3 bg-light p-4">
                <div class="flex justify-between items-center mb-6">
                    <a href="{{ route('show.top') }}" class="text-blue-500 text-sm">&lt; 戻る</a>
                </div>
                <h2 class="text-lg font-bold mb-4">授業一覧</h2>

                <a href="{{ route('show.curriculum.create') }}" class="text-center btn btn-success mb-4">新規登録</a>
                <ul>
                    @foreach ($grades as $g)
                        <li>
                            <a href="{{ route('curriculums.by.grade', ['grade_id' => $g->id]) }}"
                                class="btn btn-primary w-100 mb-4
                                @if ($g->type === '小学校') btn-primary
                                @elseif ($g->type === '中学校') btn-success
                                @elseif ($g->type === '高校') btn-warning
                                @endif">
                                {{ $g->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- メインコンテンツ -->
            <div class="col-md-9 p-4">


                @if (isset($grade))
                    <button class="btn btn-primary text-xl font-bold mb-4">
                        {{ $grade->name }}
                    </button>
                @else
                    <p>学年が選択されていません。</p>
                @endif


                <!-- 授業一覧 -->
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($curriculums as $curriculum)
                        <div class="col">
                            <div class="card h-100">
                                @if (Str::startsWith($curriculum->thumbnail, 'http'))
                                    {{-- 外部URLの場合 --}}
                                    <img src="{{ $curriculum->thumbnail }}" alt="サムネイル" width="250" height="200">
                                @else
                                    {{-- ローカルストレージの画像を表示 --}}
                                    <img src="{{ asset('storage/thumbnails/' . $curriculum->thumbnail) }}" alt="サムネイル">
                                @endif
                                <div class="card-body">
                                    <h3 class="card-title h5">{{ $curriculum->title }}</h3>

                                    <ul class="text-sm text-gray-700 mb-4">
                                        @if ($curriculum->deliveryTimes->isNotEmpty())
                                            @foreach ($curriculum->deliveryTimes as $deliveryTime)
                                                <li>{{ \Carbon\Carbon::parse($deliveryTime->delivery_from)->format('n月j日 H:i') }}
                                                    ～
                                                    {{ \Carbon\Carbon::parse($deliveryTime->delivery_to)->format('H:i') }}
                                                </li>
                                            @endforeach
                                        @else
                                            <li>配信時間は未定です。</li>
                                        @endif
                                    </ul>

                                    <div class="flex justify-between">

                                        <a href="{{ route('show.curriculum.edit', ['id' => $curriculum->id]) }}"
                                            class="btn btn-primary">授業詳細編集</a>

                                        <a href="{{ route('show.delivery.edit', ['id' => $curriculum->id]) }}"
                                            class="btn btn-primary">
                                            配信日時編集
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
