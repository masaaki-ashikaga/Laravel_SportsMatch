@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">チーム編集</h3>
        <div class="row justify-content-center col-md-12">
            <div class="d-flex flex-wrap col-md-8">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('team.update', ['team' => $team->id]) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $team->id }}">
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="name">チーム名</label>
                                @if($errors->has('name'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="チーム名を入力して下さい。" value="{{ $team->name }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="area">都道府県</label>
                                @if($errors->has('area'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('area') }}</p>
                                @endif
                            </div>
                            <select type="text" class="form-control" name="area">
                                <option value="">未選択</option>
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
                            <div class="d-flex">
                                <label for="sport_id">スポーツジャンル</label>
                                @if($errors->has('sport_id'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('sport_id') }}</p>
                                @endif
                            </div>
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
                            <div class="d-flex">
                                <label for="detail">チーム紹介文</label>
                                @if($errors->has('detail'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('detail') }}</p>
                                @endif
                            </div>
                            <textarea class="form-control" name="detail" rows="10">{{ $team->detail }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="main_imgpath">メインイメージ画像</label>
                                @if($errors->has('main_imgpath'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('main_imgpath') }}</p>
                                @endif
                            </div>
                            <input type="file" class="form-control-file" name="main_imgpath">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="sub_imgpath">サブイメージ画像</label>
                                @if($errors->has('sub_imgpath'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('sub_imgpath') }}</p>
                                @endif
                            </div>
                            <input type="file" class="form-control-file" name="sub_imgpath">
                        </div>
                        <input type="submit" class="btn btn-primary" value="チーム作成">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection