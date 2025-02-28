@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/hall/index.css') }}">
@endpush

@extends('layouts.admin.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">登録一覧</h2>
      <div class="card-container">
        @foreach ($registrations as $registration)
          <div class="card">
            <a>
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $registration->user->name }}:{{ $registration->sheet->floor->hall->name }}の{{ $registration->sheet->floor->name }}の{{ $registration->sheet->name }}席</div>
            </a>
            <div class="mutation-link-wrapper">
              <form action="{{ route('admin.registrations.destroy', ['registration' => $registration->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="mutation-link" onclick="return confirm('本当に削除しますか？')">削除</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      <button class="back-button" type="button" onclick="location.href='{{ route('admin.index') }}'">戻る</button>
    </div>
  </section>
@endsection
