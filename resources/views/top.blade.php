@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mt-0 mb-5 border-bottom border-secondary">
        <img src="{{ asset('image/top.jpg') }}" style="width: 100%;">
        <div class="mt-5">
            <h2 class="mb-4">好きなスポーツから探す</h2>
            <form class="mb-5">
                @csrf
                <input type="text" placeholder="好きなスポーツは？">
                <input type="submit" class="btn btn-primary" value="検索">
            </form>
        </div>
    </div>
    <div>
        <div class="swiper-container mb-5 pb-3 border-bottom border-secondary">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>スポーツジャンル</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('genre') }}" class="mr-3">ジャンルをすべて表示</a>
                </div>
            </div>
            <div class="swiper-wrapper text-center mb-4">
                @foreach($sports as $sport)
                    <div class="swiper-slide">
                        <a href="{{ route('eventGenre', ['id' => $sport->id]) }}">
                            <img src='image/{{ $sport->imagepath }}' style="width: 250px; height: 180px;">
                            <p class="h5 pt-2 text-secondary">{{ $sport->sport }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="swiper-container mb-5 pb-3 border-bottom border-secondary">
            <div class="d-flex justify-content-between">
                <div>
                    @if(Auth::user() != null && auth()->user()->area != null)
                    <h4>{{ auth()->user()->area }}のチーム</h4>
                    @else
                    <h4>東京のチーム</h4>
                    @endif
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('team.index') }}" class="mr-3">すべて表示</a>
                </div>
            </div>
            <div class="swiper-wrapper text-center mb-4">
                @foreach($teams as $team)
                    <div class="swiper-slide">
                        <a href="{{ route('team.show', ['team' => $team->id]) }}">
                            <img src="/image/{{ $team->main_imgpath }}" style="width: 250px; height: 180px;">
                            <p class="pt-2 pr-4 pl-4">{{ $team->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>


        <div class="swiper-container mb-5 pb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>最近作成されたイベント</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('event.index') }}" class="mr-3">すべて表示</a>
                </div>
            </div>

            <div class="swiper-wrapper text-center mb-4">
                @foreach($events as $key => $event)
                    <div class="swiper-slide">
                        <p class="pt-2 mb-1 font-weight-bold">開催:{{ $event->event_start_date }}</p>
                        <a href="{{ route('event.show', ['event' => $event->id]) }}">
                            <img src='/image/{{ $event->event_imagepath }}' style="width: 250px; height: 180px;">
                            <p class="pt-2 pr-4 pl-4 mr-auto ml-auto" style="width: 250px;">{{ $event->title }}</p>
                        </a>
                        <div>
                            <p class="mb-0 mr-auto ml-auto" style="width: 250px;"><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->address }}</p>
                            <p><i class="fas fa-running"></i>{{ $event_genre[$key] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<script>
var mySwiper = new Swiper ('.swiper-container', {
  loop: true,
  pagination: '.swiper-pagination',
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  slidesPerView: 3,
  slidesPerGroup: 3,
  breakpoints: {
    992: {
      slidesPerView: 2,
      slidesPerGroup: 2,
      spaceBetween: 0
    }
  }
})
</script>
@endsection
