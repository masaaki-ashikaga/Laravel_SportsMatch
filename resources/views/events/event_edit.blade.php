@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">イベント編集</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                <form method="POST" action="{{ route('event.update', ['event' => $event->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <div class="form-group">
                        <label for="team_id">このイベントが所属するチーム</label>
                        <a>新しいチームを追加</a>
                        <select class="form-control" name="team_id">
                            <option value="">チームを選択して下さい。</option>
                            @if($teams != null)
                            @foreach($teams as $team)
                            @foreach($team as $key => $name)
                            <option value="{{ $key }}">{{ $name }}</option>
                            @endforeach
                            @endforeach
                            @endif
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
                      <label for="title">イベントタイトル</label>
                      <input type="text" class="form-control" name="title" placeholder="イベントタイトル" value="{{ $event->title }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="event_start_date">イベント開催日</label>
                          <input type="date" class="form-control" name="event_start_date" value="{{ $event->event_start_date }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="event_start_time">イベント開始時刻</label>
                          <input type="time" name="event_start_time" class="form-control" value="{{ $event->event_start_time }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="event_end_date">イベント終了日</label>
                          <input type="date" class="form-control" name="event_end_date" value="{{ $event->event_end_date }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="event_end_time">イベント終了時刻</label>
                          <input type="time" name="event_end_time" class="form-control" value="{{ $event->event_end_time }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="apply_end_date">募集締切日</label>
                          <input type="date" class="form-control" name="apply_end_date" value="{{ $event->apply_end_date }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="apply_end_time">募集締切時刻</label>
                          <input type="time" name="apply_end_time" class="form-control" value="{{ $event->apply_end_time }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="capacity">定員</label>
                          <input type="text" class="form-control" name="capacity" value="{{ $event->capacity }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="payment">料金</label>
                          <input type="text" name="payment" class="form-control" value="{{ $event->payment }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="venue">イベント会場名前</label>
                        <input type="text" class="form-control" name="venue" placeholder="イベント会場の名前をご入力下さい。" value="{{ $event->venue }}">
                    </div>
                    <div class="form-group">
                        <label for="address">イベント会場住所</label>
                        <input type="text" class="form-control" name="address" placeholder="開催場所の住所をご入力下さい。" value="{{ $event->address }}">
                    </div>
                      <div class="form-group">
                        <label for="comment">イベント詳細</label>
                        <textarea class="form-control" name="comment" rows="10">{{ $event->comment }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_imagepath">イベントイメージ画像</label>
                        <input type="file" class="form-control-file" name="event_imagepath">
                      </div>
                    <input type="submit" class="btn btn-primary" value="イベント作成">
                  </form>
            </div>
        </div>
    </div>
@endsection
