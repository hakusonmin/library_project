@push('styles')
  <link rel="stylesheet" href="{{ asset('/css/user/registration/index.css') }}">
@endpush


@extends('layouts.admin.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">登録済み座席一覧</h2>
      <div class="card-container">
        @foreach ($registrations as $registration)
          <div class="card">
            <a href="{{ route('user.registrations.show',['registration' => $registration->id]) }}">
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $registration->sheet->floor->hall->name }}:{{ $registration->sheet->floor->name }}:{{ $registration->sheet->name }}</div>
            </a>
          </div>
          @endforeach
        </div>
    </div>
  </section>
@endsection
