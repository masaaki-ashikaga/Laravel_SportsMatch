@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex mb-4 justify-content-between">
            <h3 class="mb-4">イベント一覧</h3>
            <a href="{{ route('team.index') }}" class="font-weight-bold">チーム一覧に戻る</a>
        </div>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                @if(isset($teams))
                @foreach($teams as $items)
                @foreach($items as $team)
                <div class="mb-5" style="width: 350px;">
                    <div class="d-flex">
                        <p class="mb-0 mr-5"><i class="fas fa-map-marker-alt mr-1"></i>{{ $team->area }}</p>
                        @foreach($team->sports as $sport)
                            <p><i class="fas fa-running"></i>{{ $sport->sport }}</p>
                        @endforeach
                    </div>
                    <a href="{{ route('team.show', ['team' => $team->id]) }}">
                        <img src='/image/{{ $team->main_imgpath }}' style="width: 300px; height: 230px;">
                        <p class="h5 pt-2">{{ $team->name }}</p>
                    </a>
                </div>
                @endforeach
                @endforeach
                @else
                <p>該当のチームはございません。</p>
                @endif
            </div>
        </div>
    </div>
@endsection
