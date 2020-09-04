@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mt-0 mb-5 border-bottom border-secondary">
        <img src='/image/{{ $team->main_imgpath }}' style="width: 100%;">
    </div>
    <div>
        <div class="card">
            <div class="card-header d-flex pb-0">
              <p class="h5">チーム情報詳細</p>
              <p class="ml-5 mb-0">参加者：{{ count($users) }}人</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="d-flex pt-3 pb-3">
                        <div class="ml-4">
                            <div class="ml-4">
                                <h5 class="card-title mb-2">{{ $team->name }}</h5>
                                <p>{{ $team->detail }}</p>
                                @if(Auth::user() != null)
                                @if(!in_array(Auth::user()->id, array_column($team->users->toArray(), 'id'), TRUE))
                                    <form method="POST" action="{{ url('/team/join') }}">
                                        @csrf
                                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                                        <input type="submit" value="このチームに参加する" class="btn btn-primary">
                                    </form>
                                @elseif(Auth::user()->id === $team_user_id->user_id)
                                    <p class="bg-secondary text-white text-center p-2" style="border-radius: 5px; width: 200px;">このチームのオーナー</p>
                                @else
                                    <form method="POST" action="{{ url('/team/cancel/' . $team_user_id->id) }}">
                                        @csrf
                                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                                        <input type="submit" value="チームを退会する" class="btn btn-danger">
                                    </form>
                                @endif
                                @else
                                    <a href="/login" class="btn btn-secondary text-white">ログインしてイベントに参加する</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h5 class="card-title mb-2">チームオーナー</h5>
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
                            </div>
                        @endif
                        @endforeach
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex">
                        <div class="d-flex">
                            <h5 class="card-title mb-2 mr-4">参加ユーザー</h5>
                        </div>
                    </div>
                    <div>
                        @foreach($users as $user)
                            @if(!$user->pivot->owner_user)
                            <a href="{{ route('userDetail', ['id' => $user->id]) }}">
                                <img src='/image/{{ $user->imagepath }}' style="width: 30px; height: 30px;" class="mr-1">
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
