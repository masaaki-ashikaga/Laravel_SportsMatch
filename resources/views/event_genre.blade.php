@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mt-0 mb-5 border-bottom border-secondary">
        <div class="mt-3 mb-3">
            <h2>サッカーのイベント</h2>
        </div>
        <img src="{{ asset('image/soccer.jpg') }}" style="width: 100%;">
    </div>
    <div>
        <div class="card">
            <div class="card-header h4">
              イベント
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                  <div class="d-flex justify-content-center">
                      <img src="{{ asset('image/soccer.jpg') }}" style="width: 300px;">
                      <div class="ml-4 pt-4">
                          <p>開催日：2020年7月30日</p>
                          <p class="h2">イベントタイトル</p>
                          <p>イベントのサブタイトル</p>
                          <p><i class="fas fa-map-marker-alt mr-1"></i>大阪府大阪市中央区東心斎橋1-15-27(白水社ビル6F_4号室)</p>
                      </div>
                  </div>
              </li>
              <li class="list-group-item">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('image/soccer.jpg') }}" style="width: 300px;">
                    <div class="ml-4 pt-4">
                        <p>開催日：2020年7月30日</p>
                        <p class="h2">イベントタイトル</p>
                        <p>イベントのサブタイトル</p>
                        <p><i class="fas fa-map-marker-alt mr-1"></i>大阪府大阪市中央区東心斎橋1-15-27(白水社ビル6F_4号室)</p>
                    </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('image/soccer.jpg') }}" style="width: 300px;">
                    <div class="ml-4 pt-4">
                        <p>開催日：2020年7月30日</p>
                        <p class="h2">イベントタイトル</p>
                        <p>イベントのサブタイトル</p>
                        <p><i class="fas fa-map-marker-alt mr-1"></i>大阪府大阪市中央区東心斎橋1-15-27(白水社ビル6F_4号室)</p>
                    </div>
                </div>
              </li>
            </ul>
          </div>
    </div>
</div>

@endsection
