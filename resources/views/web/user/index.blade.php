@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/user/index.css') }}">
@endpush

@extends('layouts.user.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">ユーザールートページ</h2>
      <div class="card-container">

        <div class="card">
          <a href="{{ route('user.halls.index') }}">
            <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
            <div class="card-title">図書館一覧</div>
          </a>
        </div>

        <div class="card">
          <a href="{{ route('user.halls.index') }}">
            <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
            <div class="card-title">My登録一覧</div>
          </a>
        </div>

      </div>
    </div>
  </section>
@endsection
