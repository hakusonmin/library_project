@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/user/registration/create.css') }}">
@endpush

@extends('layouts.user.layouts')
@section('content')
  <section class="content">
    <section class="my-wrapper">
      <div class="wrapper">
        <h2 class="wrapper-title">座席情報詳細</h2>

        <div class="form-element-wrapper">
          <div class="form-element-wrapper-title">図書館名</div>
          <div class="form-element-wrapper-content">{{ $sheet->floor->hall->name }}</div>
        </div>

        <div class="form-element-wrapper">
          <div class="form-element-wrapper-title"><label for="image_url">階</label></div>
          <div class="form-element-wrapper-content">{{ $sheet->floor->name }}</div>
        </div>

        <div class="form-element-wrapper">
          <div class="form-element-wrapper-title"><label for="published_date">席の位置</label></div>
          <div class="form-element-wrapper-content">{{ $sheet->name }}</div>
        </div>

        <div>以上の内容で座席の登録を確定しますか？</div>

        <form action="{{ route('user.registrations.store') }}" method="POST">
          @csrf
          <input type="hidden" name="sheet_id" value="{{ $sheet->id }}">
          <button class="jump-button" type="submit" class="jump-button">確定する</button>
        </form>

        <button class="back-button" type="button" onClick="history.back();">戻る</button>

      </div>
    </section>
  </section>
@endsection
