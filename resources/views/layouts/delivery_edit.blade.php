@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <a href="{{ route('curriculum_list') }}" class="text-blue-500 text-sm">&lt; 戻る</a>

        <h2 class="text-lg font-bold mt-4">配信日時設定</h2>

        <p class="mb-4">授業タイトル: <strong>{{ $curriculum->title }}</strong></p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="delivery-times-form" method="POST" action="{{ route('update.delivery', ['id' => $curriculum->id]) }}">
            @csrf
            @method('PUT')

            <div id="delivery-times-container">
                @if (!empty($curriculum->deliveryTimes) && $curriculum->deliveryTimes->isNotEmpty())
                    @foreach ($curriculum->deliveryTimes as $index => $delivery)
                        <div class="row align-items-center mb-2">
                            <!-- 開始日 -->
                            <div class="col-md-2">
                                <input type="date" name="delivery_from[]"
                                    value="{{ old("delivery_from.$index", \Carbon\Carbon::parse($delivery->delivery_from)->format('Y-m-d')) }}"
                                    class="form-control">
                                @error("delivery_from.$index")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- 開始時間 -->
                            <div class="col-md-2">
                                <input type="time" name="delivery_from_time[]"
                                    value="{{ old("delivery_from_time.$index", \Carbon\Carbon::parse($delivery->delivery_from)->format('H:i')) }}"
                                    class="form-control">
                                @error("delivery_from_time.$index")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- 〜（区切り） -->
                            <div class="col-md-1 text-center">〜</div>
                            <!-- 終了日 -->
                            <div class="col-md-2">
                                <input type="date" name="delivery_to[]"
                                    value="{{ old("delivery_to.$index", \Carbon\Carbon::parse($delivery->delivery_to)->format('Y-m-d')) }}"
                                    class="form-control">
                                @error("delivery_to.$index")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- 終了時間 -->
                            <div class="col-md-2">
                                <input type="time" name="delivery_to_time[]"
                                    value="{{ old("delivery_to_time.$index", \Carbon\Carbon::parse($delivery->delivery_to)->format('H:i')) }}"
                                    class="form-control">
                                @error("delivery_to_time.$index")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- 削除ボタン -->
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-sm remove-row">ー</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>


            <button type="button" id="add-delivery-time" class="btn btn-success">＋</button>

            <button type="submit" class="btn btn-primary mt-4">登録</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("delivery-times-container");

            // 削除ボタンの処理
            container.addEventListener("click", function(event) {
                if (event.target.classList.contains("remove-row")) {
                    event.target.closest(".row").remove();
                }
            });

            // 追加ボタンの処理
            document.getElementById("add-delivery-time").addEventListener("click", function() {
                const newEntry = document.createElement("div");
                newEntry.classList.add("row", "align-items-center", "mb-2");

                newEntry.innerHTML = `
            <div class="col-md-2">
                <input type="date" name="delivery_from[]" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="time" name="delivery_from_time[]" class="form-control">
            </div>
            <div class="col-md-1 text-center">〜</div>
            <div class="col-md-2">
                <input type="date" name="delivery_to[]" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="time" name="delivery_to_time[]" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-row">－</button>
            </div>
        `;

                container.appendChild(newEntry);
            });
        });
    </script>
@endsection
