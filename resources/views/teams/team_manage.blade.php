@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">チーム管理</h3>
    <div class="mb-5">
        <div class="card">
            <div class="card-header d-flex pb-0 justify-content-between">
                <p class="h5 mt-auto mb-auto pb-2">チーム一覧</p>
                <p class="mr-5"><a href="{{ route('team.create') }}" class="btn btn-primary">新規チーム作成</a></p>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($teams as $items)
                @foreach($items as $team)
                    <li class="list-group-item">
                        <div class="d-flex pt-3 pb-3">
                            @if($team->main_imgpath != null)
                            <img src="/image/{{ $team->main_imgpath }}" style="width: 300px;">
                            @else
                            <img src="/image/no_image.jpg" style="width: 300px; height: 210px;">
                            @endif
                            <div class="ml-4 pt-4">
                                <p class="h2">{{ $team->name }}</p>
                                <p><i class="fas fa-map-marker-alt mr-1"></i>{{ $team->area }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <p class="mr-4"><a href="{{ route('team.edit',['team' => $team->id]) }}" class="btn btn-primary">編集</a></p>
                            <form method="POST" action="{{ route('team.destroy', ['team' => $team->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $team->id }}">
                                <input type="submit" class="btn btn-danger" value="削除">
                            </form>
                        </div>
                    </li>
                @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
