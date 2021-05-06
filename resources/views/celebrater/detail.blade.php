@extends('./_layouts.parent')
@section('content')

<div class="container ops-main">
  <h1>Celebrater</h1>
  <div class="row">
    <form id="frmMain" action="{{ route('celebrater.save') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="">
      <input type="hidden" name="user_id" value="1">

      <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" class="form-control" value="{{ $celebrater->name }}" placeholer="名前">
      </div>
      <div class="form-group">
        <label>関係性</label>
        <input type="text" name="relationship" class="form-control" value="{{ $celebrater->relationship }}" placeholer="関係性">
      </div>
      <div class="form-group">
        <label>性別</label>
        {{ Form::select('gender', ['男性' => '男性', '女性' => '女性'], $celebrater->gender, ['class' => 'form-control', 'placeholder' => '選択してください']) }}
      </div>

      {{-- +TODO:オーバーレイのフッターにする --}}
      <button type="submit" class="btn btn-primary">保存</button>
      @if(!empty($celebrater->id))
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="showDeleteModal()">削除</button>
      @endif
    </form>
  </div>
</div>


<!-- 削除モーダル -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">確認</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        本当に削除しますか？
      </div>
      <div class="modal-footer">
        <form action="{{ route('celebrater.delete') }}?delete_id={{ $celebrater->id }}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="delete_id" value="">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function showDeleteModal() {
    $('input[name=delete_id]').val($('input[name=id]').val());
  }
</script>
@endsection

