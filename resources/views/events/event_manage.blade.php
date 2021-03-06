@extends('layouts.app')

@section('content')
<div class="container">
    <h3>イベント管理</h3>
    <p class="mb-4 p-1 bg-danger text-white" style="width: 470px; border-radius: 4px;">※公開したイベントの編集、非公開イベントへ戻すことはできません。</p>
    <div class="mb-5">
        <div class="card">
            <div class="card-header d-flex pb-0 justify-content-between">
                <p class="h5 mt-auto mb-auto pb-2">作成中のイベント</p>
                <p class="mr-5"><a href="{{ route('event.create') }}" class="btn btn-primary">新規イベント作成</a></p>
            </div>
            <ul class="list-group list-group-flush">
                @if(isset($events))
                @foreach($events as $items)
                @foreach($items as $event)
                    <li class="list-group-item">
                        <div class="d-flex pt-3 pb-3">
                            @if($event->event_imagepath != null)
                            <img src="/image/{{ $event->event_imagepath }}" style="width: 300px;">
                            @else
                            <img src="/image/no_image.jpg" style="width: 300px; height: 210px;">
                            @endif
                            <div class="ml-4 pt-4">
                                <p>開催日：{{ $event->event_start_date }}</p>
                                <p class="h2">{{ $event->title }}</p>
                                <p><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->prefecture }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            @if($event->public === 0)
                            <p class="mr-4"><a href="{{ route('eventPublic',['id' => $event->id]) }}" onclick="return confirm('一度公開すると非公開、編集はできません。')" class="btn btn-primary">公開する</a></p>
                            <p class="mr-4"><a href="{{ route('event.edit',['event' => $event->id]) }}" class="btn btn-primary">編集</a></p>
                            @else
                            <p class="mr-4"><a href="{{ route('eventPublic',['id' => $event->id]) }}" class="btn btn-secondary disabled">公開中</a></p>
                            <p class="mr-4"><a href="{{ route('event.edit',['event' => $event->id]) }}" class="btn btn-secondary disabled">編集</a></p>
                            @endif
                            <form method="POST" action="{{ route('event.destroy', ['event' => $event->id]) }}" onSubmit="return deletecheck()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <input type="submit" class="btn btn-danger" value="削除">
                            </form>
                        </div>
                    </li>
                @endforeach
                @endforeach
                @else
                <li class="list-group-item">
                    <div class="d-flex pt-3 pb-3">
                        <p>作成中のイベントはありません。</p>
                    </div>
                </li>
            @endif
            </ul>
        </div>
    </div>
</div>


<script>
    function deletecheck(){
        'use strict';
        if(window.confirm('本当に削除しますか')){
            return true;
        } else{
            return false;
        }
    }
</script>
@endsection
