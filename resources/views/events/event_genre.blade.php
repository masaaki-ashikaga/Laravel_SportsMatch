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

                @if(!empty($events))
                @foreach($events as $event)
                    <li class="list-group-item">
                        <div class="d-flex pt-3 pb-3">
                            <img src="{{ asset('image/test_event.jpg') }}" style="width: 300px;">
                            <div class="ml-4 pt-4">
                                <div class="d-flex">
                                    <p class="mr-4">開催日：{{ $event->event_start_date }}</p>
                                    @if(date('Y-m-d') > $event->event_start_date)
                                        <p class="font-weight-bold">終了</p>
                                    @endif
                                </div>
                                <p class="h2">
                                    <a href="{{ route('event.show', ['event' => $event->id]) }}">{{ $event->title }}</a>
                                </p>
                                <p><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->address }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
                @else
                <li class="list-group-item">
                    <div class="d-flex pt-2">
                        <p>{{ $sport->sport }}のイベントはありません。</p>
                    </div>
                </li>
            @endif
            </ul>
          </div>
    </div>
</div>

@endsection
