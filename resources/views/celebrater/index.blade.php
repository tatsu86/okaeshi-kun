@extends('./_layouts.parent')
@section('content')

<div class="container ops-main">
  <h1>Celebraters</h1>

  <div class="row">
    <form name="frmSearch" actioin="{{ route('celebrater.list') }}">
    <div class="form-group">
      <label>名前</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $name) }}" placeholder="名前">
    </div>
    <button type="submit" class="btn btn-primary">検索</button>
    <a class="btn btn-secondary" href="{{ route('celebrater.list') }}">クリア</a>
    <button type="button" class="btn btn-success" onclick="createCelebrater();">新規登録</button>
    </form>
  </div>

  <div class="col-md-11 col-md-offset-1 mt-2">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">名前</th>
        <th class="text-center">性別</th>
        <th class="text-center">関係性</th>
        <th class="text-center">メモ</th>
        <th class="text-center">編集</th>
      </tr>
      @foreach($celebraters as $celebrater)
      <tr>
        <td>{{ $celebrater->id }}</td>
        <td>{{ $celebrater->name }}</td>
        <td>{{ $celebrater->gender }}</td>
        <td>{{ $celebrater->relationship }}</td>
        <td>{{ $celebrater->memo }}</td>
        <td>
          {{-- <button class="btn btn-secondary">編集</button> --}}
          <a href="{{ route('celebrater.detail') }}?id={{ $celebrater->id }}" class="btn btn-secondary">編集</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>


<script>
  function createCelebrater() {
    // 新規登録画面表示
    // +TODO:URLにパラメータが表示されないようにする
    document.frmSearch.action = "{{ route('celebrater.detail') }}";
    document.frmSearch.submit();
  }

  function editCelebrater($id) {

  }
</script>


@endsection

