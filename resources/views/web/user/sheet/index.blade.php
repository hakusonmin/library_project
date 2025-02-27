@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/user/sheet/index.css') }}">
@endpush

@extends('layouts.user.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">席一覧</h2>
      <div  class="SeatingList">
        <img src="{{ asset('./images/Sheets.jpeg') }}">
      </div>
      <div class="card-container">
        @foreach ($sheets as $sheet)
          <div class="card">
            <a href="{{ route('user.registrations.create', ['sheet_id' => $sheet->id]) }}">
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $sheet->name }}</div>
            </a>
          </div>
        @endforeach
      </div>
      <button class="back-button" type="button" onclick="location.href='{{ route('user.index') }}'">戻る</button>
    </div>
  </section>
@endsection
