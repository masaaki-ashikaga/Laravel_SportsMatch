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
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h5 class="card-title mb-2">チームオーナー</h5>
                    <div class="d-flex">
                        @foreach($users as $user)
                        @if($user->pivot->owner_user)
                            <img src='/image/{{ $user->imagepath }}' style="width: 50px; height: 50px;">
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
                                <img src='/image/{{ $user->imagepath }}' style="width: 30px; height: 30px;" class="mr-1">
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
          </div>
    </div>
</div>

@endsection
