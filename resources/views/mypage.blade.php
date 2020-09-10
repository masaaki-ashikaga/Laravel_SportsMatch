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
                            @if($user->imagepath == null)
                            <img src="/image/profile.jpg" style="width: 170px; height: 170px;">
                            @else
                            <img src="/image/{{ $user->imagepath }}" style="width: 170px; height: 170px;">
                            @endif
                        </div>
                        <div>
                            <p class="mt-5">{{ $user->profile }}</p>
                            <p>
                                <i class="fas fa-running mr-2"></i>好きなスポーツ：
                                @foreach($sports as $sport)
                                <span class="p-1 bg-primary text-white mt-0 font-weight-bold" style="border-radius: 5px;">{{ $sport->sport }}</span>
                                @endforeach
                            </p>
                            {{-- 好きなスポーツをDBから取ってない。 --}}
                        </div>
                    </div>
                    <a href="{{ route('profileEdit', ['id' => Auth::id()]) }}" class="btn btn-primary mt-3 ml-2">プロフィールを編集</a>
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
                @if(!$teams->isEmpty())
                @foreach($teams as $team)
                    <li class="list-group-item">
                        <div class="d-flex mt-2 mb-2">
                            <img src="/image/{{ $team->main_imgpath }}" style="width: 200px; height: 170px;">
                            <div class="ml-4">
                                <h5>{{ $team->name }}</h5>
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
                @else
                <p class="ml-3 mt-3">参加しているチームはありません。</p>
                @endif
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
                @if(!$events->isEmpty())
                @foreach($events as $event)
                    <li class="list-group-item">
                        <div class="d-flex">
                            <div>
                                <img src="/image/{{ $event->event_imagepath }}" style="width: 200px; height: 170px;">
                            </div>
                            <div class="ml-4">
                                <h5>{{ $event->title }}</h5>
                                <p>{{ $event->comment }}</p>
                                <div class="d-flex">
                                    <p class="mt-2"><i class="fas fa-map-marker-alt mr-1"></i>開催地：{{ $event->place }}</p>
                                    @if($event->pivot->owner_user)
                                    <p class="p-2 bg-success text-white ml-5 mt-0 font-weight-bold text-center" style="width: px; border-radius: 10px;">主催</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
                @else
                <p class="mt-3 ml-3">参加しているイベントはありません。</p>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection
