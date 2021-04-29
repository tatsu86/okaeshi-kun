@extends('./_layouts.parent')

@section('content')
<h1>HOME</h1>

<button class="btn btn-success">ボタン</button>

<div>
  <a href="{{ route('event.list') }}" class="btn btn-success">イベント</a>
</div>

<div>
    <a href="{{ route('celebrater.list') }}" class="btn btn-success">祝ってくれた人</a>
</div>

<div>
  <a href="{{ route('help.list') }}" class="btn btn-success">ヘルプ</a>
</div>
@endsection
