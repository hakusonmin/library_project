@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/hall/index.css') }}">
@endpush

@extends('layouts.user.layouts')
@section('content')
  <section class="content">
    <div class="wrapper">
      <h2 class="wrapper-title">図書館一覧</h2>
      <div class="card-container">
        @foreach ($halls as $hall)
          <div class="card">
            <a href="{{ route('admin.floors.index', ['hall_id' => $hall->id]) }}">
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $hall->name }}</div>
            </a>
            <div class="mutation-link-wrapper">
              <a class="mutation-link" href="{{ route('admin.halls.edit', ['hall' => $hall->id]) }}">編集</a>
              <form action="{{ route('admin.halls.destroy', ['hall' => $hall->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="mutation-link" onclick="return confirm('本当に削除しますか？');">
                    削除
                </button>
            </form>
            </div>
          </div>
        @endforeach
      </div>
      <button class="back-button" type="button" onclick="location.href='{{ route('admin.halls.create') }}'">新規作成</button>
      <button class="back-button" type="button" onclick="location.href='{{ route('admin.index') }}'">戻る</button>
    </div>
  </section>
@endsection
