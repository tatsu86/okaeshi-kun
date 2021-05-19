@extends('layouts.app')

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
  <h1>Event</h1>
  <div class="row">
    <form name="frmMain" action="{{ route('event.save') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ old('id', $event->id) }}">
      <input type="hidden" name="user_id" value="{{ $event->user_id }}">

      <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $event->name) }}" placeholder="名前">
      </div>
      <div class="form-group">
        <label>詳細</label>
        {{Form::textarea('detail', old('detail', $event->detail), ['class' => 'form-control', 'placeholder' => '詳細', 'rows' => '3'])}}
      </div>
    </form>
  </div>

<!-- Extra large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      @include('event.celebraterList')
    </div>
  </div>
</div>

  <div class="card">
    <div class="card-header">
      Celebraters
    </div>
    <div class="cord-body">
      <div class="">
        <table class="table text-center">
          <tr>
            <th class="text-center">名前</th>
            <th class="text-center">性別</th>
            <th class="text-center">関係性</th>
            <th class="text-center">メモ</th>
            <th class="text-center">編集</th>
          </tr>
          @foreach($event->celebraters as $celebrater)
          <tr>
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
  </div>
</div>





<div class="mt-2 height-7">
  <div class="fixed-buttom detail-footer">
    @if(!empty($event->id))
    <button type="button" class="btn btn-danger width-6" data-toggle="modal" data-target="#deleteModal" onclick="showDeleteModal()">削除</button>
    @endif
    {{-- +TODO:保存ボタンを右寄せにする --}}
    <button type="button" class="btn btn-primary width-6 " onclick="saveDetail();">保存</button>
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
        <form action="{{ route('event.delete') }}?delete_id={{ $event->id }}" method="post">
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

