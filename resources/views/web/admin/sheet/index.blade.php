@push('styles')
  <link rel="stylesheet" href="{{ asset('./css/admin/sheet/index.css') }}">
@endpush

@extends('layouts.admin.layouts')
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
            <a>
              <img class="image" src="{{ asset('./images/Thumbnail.png') }}">
              <div class="card-title">{{ $sheet->name }}</div>
            </a>
            <div class="mutation-link-wrapper">
              <a class="mutation-link" href="{{ route('admin.sheets.edit', ['floor' => $sheet->floor_id, 'sheet' => $sheet->id]) }}">編集</a>
              <form action="{{ route('admin.sheets.destroy', ['floor' => $sheet->floor_id, 'sheet' => $sheet->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="mutation-link" onclick="return confirm('本当に削除しますか？');">削除</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      <button class="back-button" type="button" onclick="location.href='{{ route('admin.sheets.create', ['floor' => $floor->id ]) }}'">新規作成</button>
      <button class="back-button" type="button" onClick="history.back();">戻る</button>
    </div>
  </section>
@endsection
