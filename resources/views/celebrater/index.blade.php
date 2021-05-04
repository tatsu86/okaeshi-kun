@extends('./_layouts.parent')
@section('content')

<h1>祝ってくれた人</h1>

<div class="container ops-main">
  <div class="row">
    <form name="frmSearch" actioin="{{ route('celebrater.list') }}">
    <div class="form-group">
      <div class="form-controller">
        <label>名前</label>
        <input type="text" name="name" value="" placeholder="名前">
      </div>

      <button type="submit" class="btn btn-primary">検索</button>
      <a class="btn btn-secondary" href="{{ route('celebrater.list') }}">クリア</a>
      <button type="button" class="btn btn-success" onclick="createCelebrater();">新規登録</button>
    </div>
    </form>
  </div>
</div>

<script>
  function createCelebrater() {
    // 新規登録画面表示
    // +TODO:URLにパラメータが表示されないようにする
    document.frmSearch.action = "{{ route('celebrater.detail') }}";
    document.frmSearch.submit();
  }
</script>


@endsection

