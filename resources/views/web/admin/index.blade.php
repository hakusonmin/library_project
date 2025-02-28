@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/index.css') }}">
@endpush

@extends('layouts.admin.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">管理者ルートページ</h2>
      <div class="card-container">
        <div class="card">
          <a href="{{ route('admin.halls.index') }}">
            <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
            <div class="card-title">図書館一覧</div>
          </a>
        </div>

        <div class="card">
          <a href="{{ route('admin.halls.index') }}">
            <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
            <div class="card-title">ユーザー一覧</div>
          </a>
        </div>

        <div class="card">
          <a href="{{ route('admin.halls.index') }}">
            <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
            <div class="card-title">登録一覧</div>
          </a>
        </div>

      </div>
    </div>
  </section>
@endsection
