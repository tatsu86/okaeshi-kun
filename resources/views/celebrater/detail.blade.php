@extends('./_layouts.parent')
@section('content')

<h1>祝ってくれた人</h1>
<div class="container ops-main">
  <div class="row">
    <form action="{{ route('celebrater.save') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="">

      <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" class="form-control" value="" placeholer="名前">
      </div>
      <div class="form-group">
        <label>関係性</label>
        <input type="text" name="relationship" class="form-control" value="" placeholer="関係性">
      </div>
      <div class="form-group">
        <label>性別</label>
        {{ Form::select('gender', ['男性', '女性'], null, ['class' => 'form-control', 'placeholder' => '選択してください']) }}
      </div>

      {{-- +TODO:オーバーレイのフッターにする --}}
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>

</div>
@endsection

