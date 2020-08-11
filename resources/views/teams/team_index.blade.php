@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">イベント一覧</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($teams as $key => $team)
                <div class="mb-5" style="width: 350px;">
                    <div class="d-flex">
                        <p class="mb-0 mr-5"><i class="fas fa-map-marker-alt mr-1"></i>{{ $team->area }}</p>
                        {{-- <p><i class="fas fa-running"></i>{{ $sports[$key] }}</p> --}}
                    </div>
                    <a href="{{ route('team.show', ['team' => $team->id]) }}">
                        <img src='/image/{{ $team->main_imgpath }}' style="width: 300px; height: 230px;">
                        <p class="h5 pt-2">{{ $team->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
