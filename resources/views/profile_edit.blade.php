@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">プロフィール編集</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                <form method="POST" action="{{ route('profileUpdate', ['id' => auth::id()]) }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="name">アカウント名</label>
                        <input type="text" class="form-control" name="name" placeholder="アカウント名を入力して下さい。" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="mail" class="form-control" name="email" placeholder="メールアドレスを入力して下さい。" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="area">都道府県</label>
                        <select type="text" class="form-control" name="area">
                            @foreach(config('pref') as $key => $score)
                            @if($user->area === $score)
                            <option value="{{ $score }}" selected>{{ $score }}</option>
                            @else
                            <option value="{{ $score }}">{{ $score }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p>好きなスポーツジャンル</p>
                        @foreach($sports as $key => $sport)
                        <p>
                        @if(in_array($sport->id, $sports_id))
                        <input type="checkbox" id="sport{{ $key }}" name="sport_id[]" value="{{ $sport->id }}" checked>
                        <label for="sport{{ $key }}">{{ $sport->sport }}</label>
                        @else
                        <input type="checkbox" id="sport{{ $key }}" name="sport_id[]" value="{{ $sport->id }}">
                        <label for="sport{{ $key }}">{{ $sport->sport }}</label>
                        @endif
                        </p>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="profile">自己紹介</label>
                        <textarea class="form-control" name="profile" rows="10" placeholder="自己紹介文を入力して下さい。">{{ $user->profile }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagepath">プロフィールイメージ画像</label>
                        <input type="file" class="form-control-file" name="imagepath">
                    </div>
                    <input type="submit" class="btn btn-primary" value="プロフィールを編集">
                  </form>
            </div>
        </div>
    </div>
@endsection
