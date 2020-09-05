@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">チーム作成</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                <form method="POST" action="{{ route('team.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">チーム名</label>
                        <input type="text" class="form-control" name="name" placeholder="チーム名を入力して下さい。">
                    </div>
                    <div class="form-group">
                        <label for="area">都道府県</label>
                        <select type="text" class="form-control" name="area">
                            @foreach(config('pref') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sport_id">スポーツジャンル</label>
                        <select class="form-control" name="sport_id">
                            <option value="">スポーツジャンルを選択して下さい。</option>
                            @foreach($sports as $sport)
                            <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail">チーム紹介文</label>
                        <textarea class="form-control" name="detail" rows="10"></textarea>
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
