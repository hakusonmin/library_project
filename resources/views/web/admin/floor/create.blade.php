@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/hall/create.css') }}">
@endpush

@extends('layouts.admin.layouts')
@section('content')
  <section class="content">
    <section class="my-wrapper">
      <div class="wrapper">
        <h2 class="wrapper-title"">階情報登録</h2>
        <form action="{{ route('admin.floors.store', ['hall' => $hall_id]) }}" method="POST">
          @csrf
          <div class="form-element-wrapper">
            <div class="form-element-wrapper-title"><label for="name">階名</label></div>
            <div class="form-element-wrapper-content"><input type="text" id="name" name="name" required></div>
          </div>
          <button class="jump-button" type="submit">送信</button>
          <button class="back-button" type="button" onclick="location.href='{{ route('admin.floors.index',['hall' => $hall_id]) }}'">戻る</button>
        </form>
      </div>
    </section>
  </section>
@endsection
