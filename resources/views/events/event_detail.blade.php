@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mt-0 mb-5 border-bottom border-secondary">
        <img src='/image/{{ $sport_img }}' style="width: 100%;">
    </div>
    <div>
        <div class="card">
            <div class="card-header d-flex pb-0">
                <p class="h5">イベント詳細</p>
                <p class="ml-5 mb-0">募集：{{ count($users) }}/{{ $event->capacity }}人</p>
                @if(date('Y-m-d') > $event->event_start_date)
                    <p class="ml-4 font-weight-bold">イベント終了</p>
                @elseif(date('Y-m-d') > $event->apply_end_date)
                    <p class="ml-4 font-weight-bold">受付終了</p>
                @elseif(count($users) >= $event->capacity)
                    <p class="ml-4 font-weight-bold">満員</p>
                @else
                    <p class="ml-4 font-weight-bold">募集中</p>
                @endif

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="d-flex pt-3 pb-3">
                        <img src='/image/soccer_event.jpg' style="width: 250px; height: 180px;">
                        <div class="ml-4">
                            <h4 class="card-title mb-1">{{ $event->title }}</h4>
                            <p>{{ $event->comment }}</p>
                            <div>
                                <p class="mr-5">開催日：{{ $event->event_start_date }}</p>
                                <p><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->address }}</p>
                            </div>
                            @if(Auth::user() != null)
                            @if(!in_array(Auth::user()->id, array_column($event->users->toArray(), 'id'), TRUE))
                                <form method="POST" action="{{ url('/event/join') }}">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="submit" value="このイベントに参加する" class="btn btn-primary">
                                </form>
                            @else
                                <form method="POST" action="{{ url('/event/cancel/' . $event_user_id->id )}}">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="submit" value="イベントをキャンセルする" class="btn btn-danger">
                                </form>
                            @endif
                            @else
                                <a href="/login" class="btn btn-secondary text-white">ログインしてイベントに参加する</a>
                            @endif
                        </div>
                    </div>
                </li>
                @if($team != null)
                <li class="list-group-item">
                    <div class="d-flex">
                        <img src='/image/{{ $team->main_imgpath }}' style="width: 250px; height: 180px;">
                        <div class="ml-4">
                            <h5 class="card-title mb-2">
                                主催チーム：<a href="{{ route('team.show', ['team' => $team->id]) }}">{{ $team->name }}</a>
                            </h5>
                            <p>{{ $team->detail }}</p>
                        </div>
                    </div>
                </li>
                @endif
                <li class="list-group-item">
                    <h5 class="card-title mb-2">イベント主催者：ユーザー名</h5>
                    <div class="d-flex">
                        @foreach($users as $user)
                        @if($user->pivot->owner_user)
                            <a href="{{ route('userDetail', ['id' => $user->id]) }}">
                                @if($user->imagepath != null)
                                    <img src='/image/{{ $user->imagepath }}' style="width: 50px; height: 50px;">
                                @else
                                    <img src='/image/profile.jpg' style="width: 50px; height: 50px;">
                                @endif
                            </a>
                            <div class="ml-4">
                                <p>{{ $user->name }}</p>
                                <p>{{ $user->profile }}</p>
                                @if($user->area != null)
                                <p class="mb-0"><i class="fas fa-map-marker-alt mr-1"></i>{{ $user->area }}</p>
                                @else
                                <p class="mb-0"><i class="fas fa-map-marker-alt mr-1"></i>未登録</p>
                                @endif
                            </div>
                        @endif
                        @endforeach
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex">
                        <div class="d-flex">
                            <h5 class="card-title mb-2 mr-4">参加ユーザー</h5>
                            <p class="mb-0"><i class="fas fa-users mr-1"></i>{{ count($users) }}名</p>
                        </div>
                    </div>
                    <div>
                        @foreach($users as $user)
                            @if(!$user->pivot->owner_user)
                            <a href="{{ route('userDetail', ['id' => $user->id]) }}">
                                <img src='/image/{{ $user->imagepath }}' style="width: 30px; height: 30px;" class="mr-1 mb-1">
                            </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
          </div>
    </div>
</div>

@endsection
