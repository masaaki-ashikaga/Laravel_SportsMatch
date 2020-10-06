@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">イベント編集</h3>
        <div class="row col-md-12 row justify-content-center">
            <div class="d-flex flex-wrap col-md-8">
                <div class="col-md-12">

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
                                @if($event->team_id === $key)
                                <option value="{{ $key }}" selected>{{ $name }}</option>
                                @else
                                <option value="{{ $key }}">{{ $name }}</option>
                                @endif
                                @endforeach
                                @endforeach
                                @endif
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
                                @if($event->sport_id === $sport->id)
                                <option value="{{ $sport->id }}" selected>{{ $sport->sport }}</option>
                                @else
                                <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="prefecture">都道府県</label>
                                @if($errors->has('prefecture'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('prefecture') }}</p>
                                @endif
                            </div>
                            <select type="text" class="form-control" name="prefecture">
                                <option value="">未選択</option>
                                @foreach(config('pref') as $key => $score)
                                @if($event->prefecture === $score)
                                <option value="{{ $score }}" selected>{{ $score }}</option>
                                @else
                                <option value="{{ $score }}">{{ $score }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="title">イベントタイトル</label>
                                @if($errors->has('title'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <input type="text" class="form-control" name="title" placeholder="イベントタイトル" value="{{ $event->title }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="event_start_date" class="mt-0">イベント開催日</label>
                                @if($errors->has('event_start_date'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('event_start_date') }}</p>
                                @endif
                            </div>
                            <input type="date" class="form-control" name="event_start_date" value="{{ $event->event_start_date }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="event_start_time">イベント開始時刻</label>
                                @if($errors->has('event_start_time'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('event_start_time') }}</p>
                                @endif
                            </div>
                            <input type="time" name="event_start_time" class="form-control" value="{{ $event->event_start_time }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="event_end_date">イベント終了日</label>
                                @if($errors->has('event_end_date'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('event_end_date') }}</p>
                                @endif
                            </div>
                            <input type="date" class="form-control" name="event_end_date" value="{{ $event->event_end_date }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="event_end_time">イベント終了時刻</label>
                                @if($errors->has('event_end_time'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('event_end_time') }}</p>
                                @endif
                            </div>
                            <input type="time" name="event_end_time" class="form-control" value="{{ $event->event_end_time }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="apply_end_date">募集締切日</label>
                                @if($errors->has('apply_end_date'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('apply_end_date') }}</p>
                                @endif
                            </div>
                            <input type="date" class="form-control" name="apply_end_date" value="{{ $event->apply_end_date }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="apply_end_time">募集締切時刻</label>
                                @if($errors->has('apply_end_time'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('apply_end_time') }}</p>
                                @endif
                            </div>
                            <input type="time" name="apply_end_time" class="form-control" value="{{ $event->apply_end_time }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="capacity">定員</label>
                                @if($errors->has('capacity'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('capacity') }}</p>
                                @endif
                            </div>
                            <input type="text" class="form-control" name="capacity" value="{{ $event->capacity }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="payment">料金</label>
                                @if($errors->has('payment'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('payment') }}</p>
                                @endif
                            </div>
                            <input type="text" name="payment" class="form-control" value="{{ $event->payment }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="venue">イベント会場名</label>
                                @if($errors->has('venue'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('venue') }}</p>
                                @endif
                            </div>
                            <input type="text" class="form-control" name="venue" placeholder="イベント会場の名前をご入力下さい。" value="{{ $event->venue }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="address">イベント会場住所</label>
                                @if($errors->has('address'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            <input type="text" class="form-control" name="address" placeholder="開催場所の住所をご入力下さい。" value="{{ $event->address }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="comment">イベント詳細</label>
                                @if($errors->has('comment'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('comment') }}</p>
                                @endif
                            </div>
                            <textarea class="form-control" name="comment" rows="10">{{ $event->comment }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="event_imagepath">イベントイメージ画像</label>
                                @if($errors->has('event_imagepath'))
                                <p class="text-danger font-weight-bold ml-3 mb-0">{{ $errors->first('event_imagepath') }}</p>
                                @endif
                            </div>
                            <input type="file" class="form-control-file" name="event_imagepath">
                        </div>
                        <input type="submit" class="btn btn-primary" value="イベント作成">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
