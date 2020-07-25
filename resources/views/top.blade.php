@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mt-0 mb-4">
        <img src="{{ asset('image/top.jpg') }}" style="width: 100%;">
        <div>
            <h2>好きなスポーツから探す</h2>
            <form>
                @csrf
                <input type="text" placeholder="好きなスポーツは？">
                <input type="submit" class="btn btn-primary" value="検索">
            </form>
        </div>
    </div>
    <div>
        <div class="d-flex justify-content-between">
            <div>
                <h4>スポーツジャンル</h4>
            </div>
            <div class="d-flex justify-content-between">
                <a href="" class="mr-3">すべて表示</a>
                <p class="mr-3"><i class="fas fa-chevron-circle-left fa-2x"></i></p>
                <p class="mr-3"><i class="fas fa-chevron-circle-right fa-2x"></i></p>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-5">
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>サッカー</p>
            </div>
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>サッカー</p>
            </div>
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>サッカー</p>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <h4>大阪のチーム</h4>
            </div>
            <div class="d-flex justify-content-between">
                <a href="" class="mr-3">すべて表示</a>
                <p class="mr-3"><i class="fas fa-chevron-circle-left fa-2x"></i></p>
                <p class="mr-3"><i class="fas fa-chevron-circle-right fa-2x"></i></p>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-5">
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>チームA</p>
            </div>
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>チームB</p>
            </div>
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>チームC</p>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <h4>最近作成されたチーム</h4>
            </div>
            <div class="d-flex justify-content-between">
                <a href="" class="mr-3">すべて表示</a>
                <p class="mr-3"><i class="fas fa-chevron-circle-left fa-2x"></i></p>
                <p class="mr-3"><i class="fas fa-chevron-circle-right fa-2x"></i></p>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>チームA</p>
            </div>
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>チームB</p>
            </div>
            <div>
                <img src="{{ asset('image/soccer.jpg') }}" style="width: 200px;">
                <p>チームC</p>
            </div>
        </div>
    </div>
</div>
@endsection
