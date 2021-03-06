@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex mb-4 justify-content-between">
        <h3 class="mb-4">イベント一覧</h3>
            <form class="form-inline my-2 my-lg-0" action="{{ route('findTeam') }}" method="POST">
                @csrf
                <label for="genre" class="ml-2 mr-3 font-weight-bold">スポーツジャンル</label>
                <select type="text" class="form-control mr-3" name="genre">
                    <option value="">未選択</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
            </form>
        </div>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($teams as $key => $team)
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
            </div>
        </div>
    </div>
@endsection
