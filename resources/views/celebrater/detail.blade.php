@extends('./_layouts.parent')
@section('content')

<div class="container mt-2">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h1>Celebrater</h1>
  <div class="row">
    <form name="frmMain" action="{{ route('celebrater.save') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ old('id', $celebrater->id) }}">
      <input type="hidden" name="user_id" value="1">

      <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $celebrater->name) }}" placeholder="名前">
      </div>
      <div class="form-group">
        <label>関係性</label>
        <input type="text" name="relationship" class="form-control" value="{{ old('relationship', $celebrater->relationship) }}" placeholder="関係性">
      </div>
      <div class="form-group">
        <label>性別</label>
        {{ Form::select('gender', ['男性' => '男性', '女性' => '女性'], old('gender', $celebrater->gender), ['class' => 'form-control width-12', 'placeholder' => '選択してください']) }}
      </div>
      <div class="form-group">
        <label>郵便場号</label>
        <div class="form-inline">
          <input type="tel" name="postal_code1" class="form-control" value="{{ old('postal_code1', $celebrater->postal_code1) }}" placeholder="000" maxlength="3">
          　ー　
          <input type="tel" name="postal_code2" class="form-control" value="{{ old('postal_code2', $celebrater->postal_code2) }}" placeholder="0000" maxlength="4">
        </div>
      </div>
      <div class="form-group">
        <label>住所</label><button type="button" class="btn btn-info btn-sm ml-2" onclick="AjaxZip3.zip2addr('postal_code1', 'postal_code2', 'address', 'address');">自動入力<i class="fas fa-arrow-right"></i></button>
        <input type="text" name="address" class="form-control" value="{{ old('address', $celebrater->address) }}" placeholder="住所">
      </div>
      <div class="form-group">
        <label>電話番号</label>
        <input type="tel" name="tel" class="form-control" value="{{ old('tel', $celebrater->tel) }}" placeholder="電話番号">
      </div>
      <div class="form-group">
        <label>メールアドレス</label>
        <input type="text" name="email" class="form-control" value="{{ old('email', $celebrater->email) }}" placeholder="メールアドレス">
      </div>
      <div class="form-group">
        <label>メモ</label>
        {{Form::textarea('memo', null, ['class' => 'form-control', 'placeholder' => 'メモ', 'rows' => '3'])}}
      </div>
      {{-- +TODO:オーバーレイのフッターにする --}}



    </form>
  </div>
</div>

<div class="mt-2 height-7">
  <div class="fixed-buttom detail-footer">
    @if(!empty($celebrater->id))
    <button type="button" class="btn btn-danger width-6" data-toggle="modal" data-target="#deleteModal" onclick="showDeleteModal()">削除</button>
    @endif
    <button type="button" class="btn btn-primary width-6 float-right" onclick="saveDetail();">保存</button>
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
  //保存処理
  function saveDetail() {
    document.frmMain.submit();
  }

  //削除確認ダイアログ表示
  function showDeleteModal() {
    $('input[name=delete_id]').val($('input[name=id]').val());
  }
</script>
@endsection

