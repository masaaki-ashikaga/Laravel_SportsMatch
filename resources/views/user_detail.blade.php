@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-5">
        <div class="card">
            <div class="card-header d-flex pb-0">
                <p class="h5">プロフィール</p>
                <p class="ml-5"><i class="fas fa-map-marker-alt mr-1"></i>{{ $user->area }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="d-flex">
                        <div>
                            <h5 class="card-title mt-2 mb-2 ml-5">{{ $user->name }}</h5>
                            <img src="/image/{{ $user->imagepath }}" style="width: 170px; height: 170px;">
                        </div>
                        <div>
                            <p class="mt-5">{{ $user->profile }}</p>
                            <p><i class="fas fa-running mr-2"></i>好きなスポーツ：<span class="p-1 bg-primary text-white mt-0 font-weight-bold" style="border-radius: 10px;">野球</span></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- 参加チームがなければ、「所属チームなし」と表示 --}}
    <div>
        <div class="card">
            <div class="card-header d-flex pb-0">
                <p class="h5">参加しているチーム</p>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($teams as $team)
                    <li class="list-group-item">
                        <div class="d-flex mt-2 mb-2">
                            <img src="/image/{{ $team->main_imgpath }}" style="width: 200px; height: 170px;">
                            <div class="ml-4">
                                <a href="{{ route('team.show', ['team' => $team->id]) }}">
                                    <h5>{{ $team->name }}</h5>
                                </a>
                                <p>{{ $team->detail }}</p>
                                <div class="d-flex">
                                    <p class="mt-2"><i class="fas fa-map-marker-alt mr-1"></i>活動エリア：{{ $team->area }}</p>
                                    @if($team->pivot->owner_user)
                                    <p class="p-2 bg-success text-white ml-5 mt-0 font-weight-bold" style="width: 75px; border-radius: 10px;">オーナー</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- 参加イベントがなければ、「参加イベントなし」と表示 --}}
    <div>
        <div class="card">
            <div class="card-header d-flex pb-0">
                <p class="h5">参加しているイベント</p>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($events as $event)
                    <li class="list-group-item">
                        <div class="d-flex">
                            <div>
                                <img src="/image/{{ $event->event_imagepath }}" style="width: 200px; height: 170px;">
                            </div>
                            <div class="ml-4">
                                <a href="{{ route('event.show', ['event' => $event->id]) }}">
                                    <h5>{{ $event->title }}</h5>
                                </a>
                                <p>{{ $event->comment }}</p>
                                <div class="d-flex">
                                    <p class="mt-2"><i class="fas fa-map-marker-alt mr-1"></i>開催地：{{ $event->address }}</p>
                                    @if($event->pivot->owner_user)
                                    <p class="p-2 bg-success text-white ml-5 mt-0 font-weight-bold text-center" style="width: px; border-radius: 10px;">主催</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
