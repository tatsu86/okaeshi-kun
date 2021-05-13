@extends('./_layouts.parent')
@section('content')

<div class="container ops-main">
  <h1>Events</h1>

  <div class="row">
    <form name="frmSearch" actioin="{{ route('event.list') }}">
    <div class="form-group">
      <label>イベント名</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $name) }}" placeholder="イベント名">
    </div>
    <button type="submit" class="btn btn-primary">検索</button>
    <a class="btn btn-secondary" href="{{ route('event.list') }}">クリア</a>
    <button type="button" class="btn btn-success" onclick="createevent();">新規登録</button>
    </form>
  </div>

  <div class="col-md-11 col-md-offset-1 mt-2">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">名前</th>
        <th class="text-center">詳細</th>
        <th class="text-center">編集</th>
      </tr>
      @foreach($events as $event)
      <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->name }}</td>
        <td>{{ $event->detail }}</td>
        <td>
          {{-- <button class="btn btn-secondary">編集</button> --}}
          <a href="{{ route('event.detail') }}?id={{ $event->id }}" class="btn btn-secondary">編集</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>


<script>
  function createevent() {
    // 新規登録画面表示
    // +TODO:URLにパラメータが表示されないようにする
    document.frmSearch.action = "{{ route('event.detail') }}";
    document.frmSearch.submit();
  }

  function editevent($id) {

  }
</script>


@endsection

