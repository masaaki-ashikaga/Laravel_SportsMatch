@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">イベント一覧</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($events as $key => $event)
                <div class="mb-5 align-top" style="width: 350px;">
                    <p class="pt-2 mb-1 font-weight-bold">開催:{{ $event->event_start_date }}</p>
                    <div style="height:70px;">
                        <p class="mb-0"><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->address }}</p>
                        <p><i class="fas fa-running"></i>{{ $event_genre[$key] }}</p>
                    </div>
                    <a href="{{ route('event.show', ['event' => $event->id]) }}">
                        <img src='/image/{{ $event->event_imagepath }}' style="width: 350px; height: 230px;">
                        <p class="h5 pt-2">{{ $event->title }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
