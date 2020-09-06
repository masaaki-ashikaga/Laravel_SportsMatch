@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">チーム編集</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                <form method="POST" action="{{ route('team.update', ['team' => $team->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $team->id }}">
                    <div class="form-group">
                        <label for="name">チーム名</label>
                        <input type="text" class="form-control" name="name" placeholder="チーム名を入力して下さい。" value="{{ $team->name }}">
                    </div>
                    <div class="form-group">
                        <label for="area">都道府県</label>
                        <select type="text" class="form-control" name="area">
                            @foreach(config('pref') as $key => $score)
                            @if($team->area === $score)
                            <option value="{{ $score }}" selected>{{ $score }}</option>
                            @else
                            <option value="{{ $score }}">{{ $score }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sport_id">スポーツジャンル</label>
                        <select class="form-control" name="sport_id">
                            <option value="">スポーツジャンルを選択して下さい。</option>
                            @foreach($sports as $sport)
                            @if($sport_team->sport_id === $sport->id)
                            <option value="{{ $sport->id }}" selected>{{ $sport->sport }}</option>
                            @else
                            <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail">チーム紹介文</label>
                        <textarea class="form-control" name="detail" rows="10">{{ $team->detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_imgpath">メインイメージ画像</label>
                        <input type="file" class="form-control-file" name="main_imgpath">
                    </div>
                    <div class="form-group">
                        <label for="sub_imgpath">サブイメージ画像</label>
                        <input type="file" class="form-control-file" name="sub_imgpath">
                    </div>
                    <input type="submit" class="btn btn-primary" value="チーム作成">
                  </form>
            </div>
        </div>
    </div>
@endsection
