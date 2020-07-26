@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">スポーツジャンル一覧</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($sports as $sport)
                <div class="mb-5">
                    <p class="h5 pt-2">{{ $sport->sport }}</p>
                    <img src='image/{{ $sport->imagepath }}' style="width: 300px; height: 230px;">
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
