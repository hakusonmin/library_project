@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/user/hall/index.css') }}">
@endpush

@extends('layouts.user.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">ホール一覧</h2>
      <div class="card-container">
        @foreach ($halls as $hall)
          <div class="card">
            <a href="{{ route('user.floors.index', ['hall_id' => $hall->id]) }}">
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $hall->name }}</div>
            </a>
          </div>
        @endforeach
      </div>
      <button class="back-button" type="button" onclick="location.href='{{ route('user.index') }}'">戻る</button>
    </div>
  </section>
@endsection
