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
                      background-color: {{ $gradeColors[$userGradeId] ?? 'lightgray' }};
                      color: white;
                      padding: 5px 10px;">
                    {{ $currentGrade }}
                </span>
            </p>
        </div>
    </div>
    <div class="row">
        @for ($i = 1; $i <= 12; $i++)
            <div class="col-md-4 mb-3">
                <div class="card" style="border: none; transform: scale(0.8);">
                    <div class="card-body text-left" style="border-radius: 50px; 
                          background-color: {{ $gradeColors[$i] ?? 'default-color' }};
                          color: white; padding: 5px; display: flex; align-items: center;">
                        {{ $grades[$i] ?? '情報が見つかりません' }}
                    </div>
                    <div class="mt-2">
                        @foreach ($curriculums as $curriculum)
                            @if ($curriculum->grade_id == $i)
                                <p>
                                    @if ($curriculum->isCleared)
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
