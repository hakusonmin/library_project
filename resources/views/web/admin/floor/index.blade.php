@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/floor/index.css') }}">
@endpush

@extends('layouts.admin.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">階一覧</h2>
      <div class="card-container">
        @foreach ($floors as $floor)
          <div class="card">
            <a href="{{ route('admin.sheets.index', ['floor' => $floor->id]) }}">
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $floor->name }}</div>
            </a>
            <div class="mutation-link-wrapper">
              <a class="mutation-link" href="{{ route('admin.floors.edit', ['hall' => $floor->hall_id, 'floor' => $floor->id]) }}">編集</a>
              <form action="{{ route('admin.floors.destroy', ['hall' => $floor->hall_id, 'floor' => $floor->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="mutation-link" onclick="return confirm('本当に削除しますか？');">削除</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      <button class="back-button" type="button" onclick="location.href='{{ route('admin.floors.create', ['hall' => $hall_id ]) }}'">新規作成</button>
      <button class="back-button" type="button" onClick="history.back();">戻る</button>
    </div>
  </section>
@endsection
