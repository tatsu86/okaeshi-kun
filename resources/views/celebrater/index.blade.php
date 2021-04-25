@extends('./_layouts.parent')

@section('content')

<h1>祝ってくれた人</h1>

<div>
  <form actioin="{{ route('celebrater.list') }}">
    <div class="form-group">
      <div class="form-controller">
        <label>名前</label>
        <input type="text" value="" placeholder="名前">
      </div>

      <a class="btn btn-primary" onclick="">検索</a>
      <a class="btn btn-secondary" href="{{ route('celebrater.list') }}">クリア</a>
      <a class="btn btn-success" onclick=""></a>
    </div>
  </form>
</div>

@endsection

