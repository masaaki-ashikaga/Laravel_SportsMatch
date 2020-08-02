@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center mt-0 mb-5 border-bottom border-secondary">
        <div class="mt-3 mb-3">
            <h2>{{ $sport->sport }}のイベント</h2>
        </div>
        <img src='/image/{{ $sport->imagepath }}' style="width: 100%;">
    </div>
    <div>
        <div class="card">
            <div class="card-header h4">
              イベント一覧
            </div>
            <ul class="list-group list-group-flush">
                @foreach($events as $event)
                    <li class="list-group-item">
                        <div class="d-flex pt-3 pb-3">
                            <img src="{{ asset('image/test_event.jpg') }}" style="width: 300px;">
                            <div class="ml-4 pt-4">
                                <p>開催日：{{ $event->event_start_date }}</p>
                                <p class="h2">
                                    <a href="{{ route('eventDetail', ['id' => $event->id]) }}">{{ $event->title }}</a>
                                </p>
                                <p>イベントのサブタイトル</p>
                                <p><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->place }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
          </div>
    </div>
</div>

@endsection
