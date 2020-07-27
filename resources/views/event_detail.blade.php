@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mt-0 mb-5 border-bottom border-secondary">
        <img src='/image/soccer.jpg' style="width: 100%;">
    </div>
    <div>
        <div class="card">
            <div class="card-header h5">
              イベント詳細
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h4 class="card-title mb-1">{{ $event->title }}</h4>
                    <p class="card-text">ここにサブタイトル入れる</p>
                    <p>{{ $event->comment }}</p>
                    <p>開催日：{{ $event->event_start_date }}</p>
                    <p><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->place }}</p>
                </li>
            </ul>
          </div>
    </div>
</div>

@endsection
