@extends('user.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('user.show.top') }}" style="text-decoration: none; color: black;">
            ← 戻る
        </a>
    </div>
    <div class="d-flex align-items-center mb-4">
    <img class="mr-3" src="{{ asset('storage/images/profile/' . Auth::user()->profile_image) }}" alt="プロフィール画像" width="80" height="80" style="margin-right: 10px;">
        <div>
            <h2>{{ Auth::user()->name }}さんの授業進捗</h2>
            <p>現在の学年：
                <span class="grade-icon" style="border-radius: 50px; 
                          background-color: {{ Auth::user()->grade_id <= 6 ? 'paleturquoise' : (Auth::user()->grade_id <= 9 ? 'turquoise' : 'mediumspringgreen') }};
                          color: white;
                          padding: 5px 10px;">
                    @php
                        $grades = [
                            1 => '小学校1年生',
                            2 => '小学校2年生',
                            3 => '小学校3年生',
                            4 => '小学校4年生',
                            5 => '小学校5年生',
                            6 => '小学校6年生',
                            7 => '中学校1年生',
                            8 => '中学校2年生',
                            9 => '中学校3年生',
                            10 => '高校1年生',
                            11 => '高校2年生',
                            12 => '高校3年生',
                        ];
                        echo $grades[Auth::user()->grade_id];
                    @endphp
                </span>
            </p>
        </div>
    </div>
    <div class="row">
        @for ($i = 1; $i <= 12; $i++)
            <div class="col-md-4 mb-3">
                <div class="card" style="border: none; transform: scale(0.8);">
                    <div class="card-body text-left" style="border-radius: 50px; 
                          background-color: {{ $i <= 6 ? 'paleturquoise' : ($i <= 9 ? 'turquoise' : 'mediumspringgreen') }};
                          color: white;
                          padding: 5px; display: flex; align-items: center;">
                        <span style="font-size: 0.8em; margin-left: 10px;">
                            {{ $grades[$i] }}
                        </span>
                    </div>
                    <div class="mt-2">
                        @foreach ($curriculums as $curriculum)
                            @if ($curriculum->grade_id == $i)
                                @php
                                    $progress = $curriculum->progress()->where('users_id', Auth::id())->first();
                                    $isCleared = $progress && $progress->clear_flg;
                                @endphp
                                <p>
                                    @if ($isCleared)
                                        <span style="color: red; margin-right: 5px;">受講済み</span>
                                    @endif
                                    {{ $curriculum->title }}
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

@endsection
